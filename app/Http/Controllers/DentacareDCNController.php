<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Log;
use Illuminate\Http\Request;

class DentacareDCNController extends Controller {

    public function __construct() {
        parent::__construct();

        Log::useDailyFiles(storage_path().'/logs/user-api-actions.log');
    }

    protected function getView()   {
        return view('pages/withdraw-dentacare-dcn', []);
    }

    protected function authenticate(Request $request)   {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required'
        ], [
            'email.required' => 'Email is required.',
            'email.email' => 'Email address is not valid.',
            'password.required' => 'Password is required.'
        ]);

        $login_response = (new APIRequestsController())->dentacareLogin(array('email' => $request->input('email'), 'password' => $request->input('password')));

        if(property_exists($login_response, 'token')) {
            //existing account
            $account_data_response = (new APIRequestsController())->getDentacareAccount($login_response->token);
            if($account_data_response->confirmed) {
                Log::info('Dentacare user logged in successfully.');

                $earned_dcn = (new APIRequestsController())->getUserDashboard($login_response->token)->earnedDCN;
                $upgradeable_content = view('pages/verified-withdraw-dentacare-dcn', ['earned_dcn' => $earned_dcn]);
                return response()->json(['success' => true, 'upgradeable_content' => $upgradeable_content->render(), 'token' => $login_response->token, 'amount' => $earned_dcn]);
            } else {
                $submit_request_link_response = (new APIRequestsController())->submitConfirmationRequestLink($login_response->token);
                if(property_exists($submit_request_link_response, 'code') && $submit_request_link_response->code == 200) {
                    Log::info('Confirmation link submitted to Dentacare user successfully.');
                    return response()->json(['success' => 'We have sent you account confirmation link. Please check your email, click the link and come back to this page.']);
                } else {
                    return response()->json(['error' => 'Account Confirmation link have been sent to your email already few minutes ago, please try again later.']);
                }
            }
        } else {
            return response()->json(['error' => 'Not exiting Dentacare account. Please try again with different username or password.']);
        }
    }

    protected function socialAuthenticate(Request $request)   {
        $this->validate($request, [
            'email' => 'email|required',
            'user_id' => 'required',
            'token' => 'required',
        ], [
            'email.required' => 'Email is required.',
            'email.email' => 'Email address is not valid.',
            'user_id.required' => 'User ID is required.',
            'token.required' => 'Token is required.'
        ]);

        $login_response = (new APIRequestsController())->dentacareLogin(array('email' => $request->input('email'), 'facebookID' => $request->input('user_id'), 'facebookAccessToken' => $request->input('token')));

        if(property_exists($login_response, 'token')) {
            //existing account
            $account_data_response = (new APIRequestsController())->getDentacareAccount($login_response->token);
            if($account_data_response->confirmed) {
                Log::info('Dentacare user social logged in successfully.');

                $earned_dcn = (new APIRequestsController())->getUserDashboard($login_response->token)->earnedDCN;
                $upgradeable_content = view('pages/verified-withdraw-dentacare-dcn', ['earned_dcn' => $earned_dcn]);
                return response()->json(['success' => true, 'upgradeable_content' => $upgradeable_content->render(), 'token' => $login_response->token, 'amount' => $earned_dcn]);
            } else {
                $submit_request_link_response = (new APIRequestsController())->submitConfirmationRequestLink($login_response->token);
                if(property_exists($submit_request_link_response, 'code') && $submit_request_link_response->code == 200) {
                    Log::info('Confirmation link submitted to Dentacare user successfully (social login).');

                    return response()->json(['success' => 'We have sent you account confirmation link. Please check your email, click the link and come back to this page.']);
                } else {
                    return response()->json(['error' => 'Account Confirmation link have been sent to your email already few minutes ago, please try again later.']);
                }
            }
        } else {
            return response()->json(['error' => 'Not exiting Dentacare account. Please try again with different username or password.']);
        }
    }

    protected function dentacareWithdraw(Request $request)   {
        $this->validate($request, [
            'address' => 'required',
            'token' => 'required',
            'amount' => 'required',
        ], [
            'email.required' => 'Wallet address is required.',
            'token.required' => 'Token is required.',
            'amount.required' => 'Amount is required.',
        ]);

        $withdraw_response = (new APIRequestsController())->dentacareWithdraw($request->input('token'), array('wallet' => $request->input('address'), 'amount' => $request->input('amount')));
        if(property_exists($withdraw_response, 'code')) {
            if($withdraw_response->code == 400) {
                Log::error('User failed to withdraw from Dentacare.', ['api_errors' => json_encode($withdraw_response->errors)]);
                if(in_array('amount.greater.zero', $withdraw_response->errors)) {
                    return response()->json(['error' => 'Amount should be greater than zero.']);
                }
                return response()->json(['error' => 'Withdraw is not working at the moment, please try again later.']);
            } else if($withdraw_response->code == 200) {
                Log::info('User withdraw from Dentacare successfully.');
                return response()->json(['success' => 'You withdrawn your Dentacoins successfully, please check your Wallet']);
            }
        } else {
            Log::error('User failed to withdraw from Dentacare. API is not working at the moment.');
            return response()->json(['error' => 'Withdraw is not working at the moment, please try again later.']);
        }
    }

    protected function confirmAccount($token) {
        if(!empty($token)) {
            $user = DB::connection('mysql2')->table('users')->leftJoin('denta_users', 'users.id', '=', 'denta_users.id')->select('users.*', 'denta_users.confirmation_token_validity')->where(array('users.confirmation_token' => $token))->get()->first();
            if(!empty($user)) {
                if (time() - strtotime($user->confirmation_token_validity) > 60*60*24) {

                    Log::error('Dentacare user confirmation link has been expired.');
                    return view('pages/account-verification', ['info' => true]);
                } else {
                    //removing the token
                    DB::connection('mysql2')->table('users')->where(array('confirmation_token' => $token, 'id' => $user->id))->limit(1)->update(array('confirmation_token' => NULL,));

                    DB::connection('mysql2')->table('denta_users')->where(array('id' => $user->id))->limit(1)->update(array('confirmation_token_validity' => NULL, 'verified' => true));

                    Log::info('Dentacare user confirming account successfully.');

                    return view('pages/account-verification', ['success' => true]);
                }
            } else {
                Log::error('Dentacare user confirming account failed.');

                return view('pages/account-verification', ['error' => true]);
            }
        } else {
            return view('pages/account-verification', ['error' => true]);
        }
    }

    protected function getPasswordResetView($token = null) {
        if (empty(session('success-response')) && empty($token)) {
            return abort(404);
        } else {
            return view('pages/password-reset', array('token' => $token));
        }
    }

    protected function submitPasswordReset($token, Request $request) {
        if (empty($token)) {
            return abort(404);
        }

        $this->validate($request, [
            'password' => 'required',
            'repeat-password' => 'required'
        ], [
            'password.required' => 'Password is required.',
            'repeat-password.required' => 'Repeat password is required.',
        ]);

        $resetPasswordResponse = (new APIRequestsController())->resetPassword($token, array(
            'password' => trim($request->input('password')),
            'password-repeat' => trim($request->input('repeat-password'))
        ));

        if (!empty($resetPasswordResponse) && is_object($resetPasswordResponse) && property_exists($resetPasswordResponse, 'success') && $resetPasswordResponse->success) {
            Log::info('User changed Dentacare password successfully.');

            return redirect()->route('dentacare-password-reset')->with(array('success-response' => 'Your password has been changed successfully.'));
        } else if (!empty($resetPasswordResponse) && is_object($resetPasswordResponse) && property_exists($resetPasswordResponse, 'success') && !$resetPasswordResponse->success) {
            Log::error('User failed to change Dentacare password.', ['errors' => $resetPasswordResponse->message]);

            return redirect()->route('dentacare-password-reset', ['token' => $token])->with(array('error-response' => 'Password change failed, please try again later or request new password reset.'));
        } else {
            Log::error('User failed to change Dentacare password. API is not working at the moment.');

            return redirect()->route('dentacare-password-reset', ['token' => $token])->with(array('error-response' => 'Password change failed, please try again later or request new password reset.'));
        }
    }

    protected function doubleCheckDentacareTransaction(Request $request)   {
        $this->validate($request, [
            'type' => 'required',
            'address' => 'required',
            'amount' => 'required',
            'transaction_id' => 'required'
        ], [
            'type.required' => 'Type is required.',
            'address.required' => 'Address is required.',
            'amount.required' => 'Amount is required.',
            'transaction_id.required' => 'Tx ID is required.'
        ]);

        Log::info('doubleCheckDentacareTransaction method:', ['type' => $request->input('type'), 'address' => $request->input('address'), 'amount' => $request->input('amount'), 'transaction_id' => $request->input('transaction_id')]);

        if ($request->input('type') == 'dentacare') {
            $transaction = DB::connection('mysql2')->table('wallet_transactions')->select('wallet_transactions.*')->where(array('wallet_transactions.wallet_dcn' => $request->input('address'), 'wallet_transactions.amount_dcn' => $request->input('amount'), 'wallet_transactions.id' => $request->input('transaction_id')))->get()->first();
            if (!empty($transaction)) {
                Log::info('doubleCheckDentacareTransaction method succeed.');
                return response()->json(['success' => true]);
            } else {
                Log::info('doubleCheckDentacareTransaction method failed.');
                return response()->json(['success' => false]);
            }
        } else {
            Log::info('doubleCheckDentacareTransaction method wrong type.');
            return response()->json(['success' => false]);
        }
    }
}
