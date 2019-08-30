@extends("layout")
@section("content")
    <section class="padding-top-150 padding-bottom-200 padding-top-xs-100 padding-bottom-xs-100 account-verification">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-offset-2 col-lg-6 col-lg-offset-3 text-center">
                    @if(!empty($success))
                        <div class="alert alert-success fs-20">Congrats, your account has been verified! You may now log into Dentacare App and earn Dentacoin.</div>
                    @elseif(!empty($error))
                        <div class="alert alert-danger fs-20">Error, not valid token.</div>
                    @elseif(!empty($info))
                        <div class="alert alert-info fs-20">The confirmation link has been expired. Click <a href="{{route('withdraw-dentacare-dcn')}}" class="lato-bold">here</a> to login with your Dentacare App account and you will receive new confirmation link on your email.</div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection