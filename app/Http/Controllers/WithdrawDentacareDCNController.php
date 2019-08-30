<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Log;
use Illuminate\Http\Request;

class WithdrawDentacareDCNController extends Controller
{
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
                $earned_dcn = (new APIRequestsController())->getUserDashboard($login_response->token)->earnedDCN;
                $upgradeable_content = view('pages/verified-withdraw-dentacare-dcn', ['earned_dcn' => $earned_dcn]);
                return response()->json(['success' => true, 'upgradeable_content' => $upgradeable_content->render(), 'token' => $login_response->token, 'amount' => $earned_dcn]);
            } else {
                $submit_request_link_response = (new APIRequestsController())->submitConfirmationRequestLink($login_response->token);
                if(property_exists($submit_request_link_response, 'code') && $submit_request_link_response->code == 200) {
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
                Log::error('User failed to withdraw from Dentacare.', ['api_errors' => $withdraw_response->errors]);
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
            $user = DB::connection('mysql2')->table('users')->leftJoin('denta_users', 'users.id', '=', 'denta_users.id')->select('users.*', 'denta_users.confirmation_token_validity')->where(array('confirmation_token' => $token))->get()->first();
            if (time() - strtotime($user->confirmation_token_validity) > 60*60*24) {
                return view('pages/account-verification', ['info' => true]);
            } else {
                if(!empty($user)) {
                    //removing the token
                    DB::connection('mysql2')->table('users')->whconfirmation_token_validityere(array('confirmation_token' => $token, 'id' => $user->id))->limit(1)->update(array('confirmation_token' => NULL));

                    DB::connection('mysql2')->table('denta_users')->where(array('id' => $user->id))->limit(1)->update(array('confirmation_token_validity' => NULL));
                    return view('pages/account-verification', ['success' => true]);
                } else {
                    return view('pages/account-verification', ['error' => true]);
                }
            }
        } else {
            return view('pages/account-verification', ['error' => true]);
        }
    }
}
