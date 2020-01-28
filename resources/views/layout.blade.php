<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <link rel="shortcut icon" href="{{URL::asset('assets/images/favicon.png') }}" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5" />
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    @if(!empty($meta_data))
        <title>{{$meta_data->title}}</title>
        <meta name="description" content="{{$meta_data->description}}" />
        <meta name="keywords" content="{{$meta_data->keywords}}" />
        <meta property="og:url" content="{{Request::url()}}"/>
        <meta property="og:title" content="{{$meta_data->social_title}}"/>
        <meta property="og:description" content="{{$meta_data->social_description}}"/>
        @if(!empty($meta_data->media))
            <meta property="og:image" content="{{URL::asset('assets/uploads/'.$meta_data->media->name)}}"/>
            <meta property="og:image:width" content="1200"/>
            <meta property="og:image:height" content="630"/>
        @endif
    @endif
    @if(!empty(Route::current()) && Route::current()->getName() == 'home')
        <link rel="canonical" href="{{route('home')}}" />
    @endif
    <style>

    </style>
    <link rel="stylesheet" type="text/css" href="/dist/css/front-libs-style.css?v=1.0.6">
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css?v=1.0.6">
    <script>
        var HOME_URL = '{{ route("home") }}';
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-108398439-5"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        @if(empty($_COOKIE['performance_cookies']))
            gtag('config', 'UA-108398439-5', {'anonymize_ip': true});
        @else
            gtag('config', 'UA-108398439-5');
        @endif
    </script>
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        @if(empty($_COOKIE['marketing_cookies']))
            fbq('consent', 'revoke');
        @else
            fbq('consent', 'grant');
        @endif
        fbq('init', '2366034370318681');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=2366034370318681&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
</head>
<body class="@if(!empty(Route::current())) {{Route::current()->getName()}} @else class-404 @endif @if((new \App\Http\Controllers\UserController())->checkSession()) logged-in @endif">

<div class="bottom-fixed-container">
   {{-- <a href="https://dentacoin.com/holiday-calendar-2019" target="_blank" class="display-block banner">
        <picture itemscope="" itemtype="http://schema.org/ImageObject">
            <source media="(max-width: 992px)" srcset="//dentacoin.com/assets/uploads/mobile-christmas-banner-small.gif"/>
            <img src="//dentacoin.com/assets/uploads/christmas-banner.gif" alt="Holiday calendar banner" class="width-100" itemprop="contentUrl"/>
        </picture>
    </a>--}}
    @if(empty($_COOKIE['performance_cookies']) && empty($_COOKIE['functionality_cookies']) && empty($_COOKIE['marketing_cookies']) && empty($_COOKIE['strictly_necessary_policy']))
        <div class="privacy-policy-cookie">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="text inline-block">This site uses cookies. Find out more on how we use cookies in our <a href="https://dentacoin.com/privacy-policy" class="link" target="_blank">Privacy Policy</a>. | <a href="javascript:void(0);" class="link adjust-cookies">Adjust cookies</a></div>
                        <div class="button inline-block"><a href="javascript:void(0);" class="white-light-blue-btn accept-all">Accept all cookies</a></div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

<header @if(!empty(Route::current()) && Route::current()->getName() == 'home') class="home-header" @endif>
    <div class="container">
        <div class="row fs-0">
            @if(!empty(Route::current()) && Route::current()->getName() != 'home' || empty(Route::current()))
                <figure itemscope="" itemtype="http://schema.org/Organization" class="col-xs-6 inline-block">
                    <a itemprop="url" href="{{ route('home') }}">
                        <img src="{{URL::asset('assets/images/dentacare-logo.svg') }}" itemprop="logo" class="max-width-60" alt="Dentacare logo"/>
                    </a>
                </figure>
            @endif
            <div class="@if(!empty(Route::current()) && Route::current()->getName() != 'home') col-xs-6 inline-block @else col-xs-12 @endif no-gutter text-right">
                @if((new \App\Http\Controllers\UserController())->checkSession())
                    <div class="logged-user-right-nav with-hub">
                        <div class="hidden-box-parent">
                            @php($user_data = (new \App\Http\Controllers\APIRequestsController())->getUserData(session('logged_user')['id']))
                            <span class="fs-14 padding-right-10 user-name">{{$user_data->name}}</span>
                            <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block header-avatar">
                                @if(!empty($user_data->thumbnail_url))
                                    <img alt="" itemprop="contentUrl" src="{{$user_data->thumbnail_url}}"/>
                                @else
                                    <img alt="" itemprop="contentUrl" src="/assets/images/avatar-icon.svg"/>
                                @endif
                            </figure>
                            <span class="up-arrow">▲</span>
                            <div class="hidden-box">
                                <div class="hidden-box-hub container-fluid">
                                    <div class="row close-btn">
                                        <div class="col-xs-12"><a href="javascript:void(0)">Close <span>X</span></a></div>
                                    </div>
                                    <div class="row">
                                        @php($applications = (new \App\Http\Controllers\Controller())->getDentacoinHubApplications())
                                        @foreach($applications as $application)
                                            <a @if(!empty($application->link)) href="{{$application->link}}" target="_blank" @else href="javascript:alert('Coming soon!');" @endif class="col-md-3 col-xs-4 inline-block-top application" data-platform="{{$application->title}}">
                                                <figure class="text-center" itemtype="http://schema.org/ImageObject">
                                                    @if($application->media_name)
                                                        <img src="{{$application->media_name}}" itemprop="contentUrl" alt="{{$application->media_alt}}"/>
                                                    @endif
                                                    <figcaption class="color-white fs-14 fs-xs-20 padding-bottom-15">{{$application->title}}</figcaption>
                                                </figure>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="container-fluid text-center hidden-box-footer">
                                    <div class="row">
                                        <div class="col-xs-6 inline-block">
                                            <a href="{{ route('user-logout') }}" class="logout"><i class="fa fa-power-off" aria-hidden="true"></i> Log out</a>
                                        </div>
                                        <div class="col-xs-6 inline-block">
                                            <a href="//account.dentacoin.com?platform=dentacare" class="fs-16 white-light-blue-btn">My Account</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif(!empty(Route::current()) && Route::current()->getName() == 'home')
                    {{--<a href="javascript:void(0)" class="show-login-signin margin-top-10 light-blue-white-btn">SIGN IN</a>--}}
                @endif
            </div>
        </div>
    </div>
</header>
<main>@yield('content')</main>
<footer class="margin-top-30 padding-bottom-150 padding-bottom-sm-200 padding-bottom-xs-200">
    <div class="container">
        <div class="row fs-0">
            <div class="col-xs-12 col-md-10 col-md-offset-1 border-top padding-top-40">
                <div class="row">
                    <div class="col-xs-12 col-md-3 inline-block text-center-xs text-center-sm padding-bottom-xs-20 padding-bottom-sm-20">
                        <figure itemscope="" itemtype="http://schema.org/Organization">
                            <a itemprop="url" href="//dentacoin.com" class="fs-14">
                                <img src="/assets/images/logo.svg" itemprop="logo" class="max-width-30" alt="Dentacoin logo"/>
                                <span class="color-main padding-left-10 inline-block">Powered by Dentacoin</span>
                            </a>
                        </figure>
                    </div>
                    <div class="col-xs-12 col-md-6 text-center inline-block padding-bottom-xs-20 padding-bottom-sm-20">
                        @if(!empty(Route::current()))
                            @php($footer_menu = \App\Http\Controllers\Controller::instance()->getMenu('footer'))
                            @if(!empty($footer_menu) && sizeof($footer_menu) > 0)
                                <ul itemscope="" itemtype="http://schema.org/SiteNavigationElement" class="fs-14 color-main">
                                    @php($pass_first = false)
                                    @foreach($footer_menu as $menu_el)
                                        @if((isset($mobile) && $mobile && $menu_el->mobile_visible) || (isset($mobile) && !$mobile && $menu_el->desktop_visible))
                                            @if($pass_first)
                                                <li class="inline-block-top separator">|</li>
                                            @endif
                                            <li class="inline-block-top"><a @if($menu_el->new_window) target="_blank" @endif itemprop="url" href="{{$menu_el->url}}" class="color-main {{$menu_el->class_attribute}}"><span itemprop="name">{!! $menu_el->name !!}</span></a></li>
                                            @if(!$pass_first)
                                                @php($pass_first = true)
                                            @endif
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                        @endif
                    </div>
                    <div class="col-xs-12 col-md-3 inline-block text-right socials text-center-xs text-center-sm" itemscope="" itemtype="http://schema.org/Organization">
                        <link itemprop="url" href="{{ route('home') }}">
                        <span class="padding-right-10 inline-block fs-14">Stay in the loop:</span>
                        <ul class="inline-block">
                            <li class="inline-block">
                                <a itemprop="sameAs" target="_blank" href="https://www.facebook.com/dentacare.dentacoin/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            </li>
                            <li class="inline-block telegram">
                                <a itemprop="sameAs" target="_blank" href="https://t.me/dentacoin"><i class="fa fa-telegram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 text-center fs-12 padding-top-10 color-main">® Dentacoin Foundation. All rights reserved. 2019</div>
                </div>
            </div>
        </div>
    </div>
</footer>

{{--@if(!\App\Http\Controllers\UserController::instance()->checkSession() && !empty(Route::current()) && Route::current()->getName() == 'home')
    @php($inviter = \Illuminate\Support\Facades\Input::get('inviter'))
    @php($api_enums = (new \App\Http\Controllers\APIRequestsController())->getAllEnums())
    <div class="hidden-login-form hide">
        <div class="fs-0 popup-header-action">
            <a href="javascript:void(0)" class="inline-block" data-type="patient">I'm a Patient</a>
            <a href="javascript:void(0)" class="inline-block init-dentists-click-event" data-type="dentist">I'm a Dentist</a>
        </div>
        <div class="fs-0 popup-body">
            <div class="patient inline-block custom-hide">
                <div class="form-login">
                    <h2>LOG IN</h2>
                    <div class="padding-bottom-10">
                        <a href="javascript:void(0)" class="facebook-custom-btn social-login-btn calibri-regular fs-20" data-url="//api.dentacoin.com/api/register" data-platform="dentists" @if(isset($inviter)) data-inviter="{{$inviter}}" @endif data-type="patient">with Facebook</a>
                    </div>
                    <div>
                        <a href="javascript:void(0)"  class="civic-custom-btn social-login-btn calibri-regular fs-20" data-url="//api.dentacoin.com/api/register" data-platform="dentists" @if(isset($inviter)) data-inviter="{{$inviter}}" @endif data-type="patient">with Civic</a>
                    </div>
                    <div class="popup-half-footer">
                        Don't have an account? <a href="javascript:void(0)" class="call-sign-up color-white">Sign up</a>
                    </div>
                </div>
                <div class="form-register">
                    <h2>SIGN UP</h2>
                    <div class="padding-bottom-10">
                        <a href="javascript:void(0)" class="facebook-custom-btn social-login-btn calibri-regular fs-20" data-url="//api.dentacoin.com/api/register" data-platform="dentists" @if(isset($inviter)) data-inviter="{{$inviter}}" @endif data-type="patient" custom-stopper="true">with Facebook</a>
                    </div>
                    <div>
                        <a href="javascript:void(0)"  class="civic-custom-btn social-login-btn calibri-regular fs-20" data-url="//api.dentacoin.com/api/register" data-platform="dentists" @if(isset($inviter)) data-inviter="{{$inviter}}" @endif data-type="patient" custom-stopper="true">with Civic</a>
                    </div>
                    <div class="privacy-policy-row padding-top-20">
                        <div class="pretty p-svg p-curve agree-with white-border">
                            <input type="checkbox" id="privacy-policy-registration-patient"/>
                            <div class="state p-success">
                                <!-- svg path -->
                                <svg class="svg svg-icon" viewBox="0 0 20 20">
                                    <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                </svg>
                                <label class="fs-14 padding-left-5">I agree with <a href="//dentacoin.com/privacy-policy" class="color-white" target="_blank">Privacy Policy</a></label>
                            </div>
                        </div>
                    </div>
                    <div class="step-errors-holder"></div>
                    <div class="popup-half-footer">
                        Already have an account? <a href="javascript:void(0)" class="call-log-in">Log in</a>
                    </div>
                </div>
            </div>
            <div class="dentist inline-block">
                <div class="form-login">
                    <h2>LOG IN</h2>
                    <form method="POST" action="{{ route('dentist-login') }}" id="dentist-login">
                        <div class="padding-bottom-10 field-parent">
                            <div class="custom-google-label-style module" data-input-blue-green-border="true">
                                <label for="dentist-login-email">Email address:</label>
                                <input class="full-rounded form-field" name="email" maxlength="100" type="email" id="dentist-login-email" placeholder=""/>
                            </div>
                        </div>
                        <div class="padding-bottom-20 field-parent">
                            <div class="custom-google-label-style module" data-input-blue-green-border="true">
                                <label for="dentist-login-password">Password:</label>
                                <input class="full-rounded form-field" name="password" maxlength="50" id="dentist-login-password" type="password"/>
                            </div>
                        </div>
                        <div class="btn-container text-center">
                            <input type="submit" value="Log in" class="white-light-blue-btn small fs-20"/>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                        </div>
                        <div class="text-center padding-top-40 fs-16">Don't have an account? <a href="javascript:void(0)" class="call-sign-up fs-20">Sign up</a></div>
                    </form>
                    <div class="popup-half-footer">
                        <a href="{{route('forgotten-password')}}">Forgotten password?</a>
                    </div>
                </div>
                <div class="form-register">
                    <h2>Sign Up Now - Quick & Easy!</h2>
                    <form method="POST" enctype="multipart/form-data" id="dentist-register" action="{{ route('dentist-register') }}">
                        <div class="step first visible" data-step="first">
                            <div class="padding-bottom-10 field-parent">
                                <div class="custom-google-label-style module" data-input-blue-green-border="true">
                                    <label for="dentist-register-email">Work Email Address:</label>
                                    <input class="full-rounded form-field" name="email" maxlength="100" type="email" id="dentist-register-email"/>
                                </div>
                            </div>
                            <div class="padding-bottom-10 field-parent">
                                <div class="custom-google-label-style module" data-input-blue-green-border="true">
                                    <label for="dentist-register-password">Password:</label>
                                    <input class="full-rounded form-field password" name="password" minlength="6" maxlength="50" type="password" id="dentist-register-password"/>
                                </div>
                            </div>
                            <div class="padding-bottom-20 field-parent">
                                <div class="custom-google-label-style module" data-input-blue-green-border="true">
                                    <label for="dentist-register-repeat-password">Repeat password:</label>
                                    <input class="full-rounded form-field repeat-password" name="repeat-password" minlength="6" maxlength="50" type="password" id="dentist-register-repeat-password"/>
                                </div>
                            </div>
                        </div>
                        <div class="step second" data-step="second">
                            <div class="padding-bottom-20 user-type-container fs-0">
                                <input type="hidden" name="user-type" value="dentist"/>
                                <div class="inline-block-top user-type active padding-right-15" data-type="dentist">
                                    <a href="javascript:void(0)" class="custom-button">
                                        <span class="custom-radio inline-block"><span class="circle"></span></span> <span class="inline-block">Dentist</span>
                                    </a>
                                    <div class="fs-14 light-gray-color">For associate dentists OR independent practitioners</div>
                                </div>
                                <div class="inline-block-top user-type padding-left-15" data-type="clinic">
                                    <a href="javascript:void(0)" class="custom-button">
                                        <span class="custom-radio inline-block"><span class="circle"></span></span> <span class="inline-block">Clinic</span>
                                    </a>
                                    <div class="fs-14 light-gray-color">For clinics with more than one dental practitioners</div>
                                </div>
                            </div>
                            <div class="padding-bottom-25 field-parent">
                                <div class="custom-google-select-style module">
                                    <label>Title:</label>
                                    <select class="form-field required" name="dentist-title">
                                        @foreach($api_enums->titles as $key => $title)
                                            <option value="{{$key}}">{{$title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="padding-bottom-15 field-parent">
                                <div class="custom-google-label-style module" data-input-blue-green-border="true">
                                    <label for="dentist-register-latin-name">Your Name (Latin letters):</label>
                                    <input class="full-rounded form-field required" name="latin-name" maxlength="100" type="text" id="dentist-register-latin-name"/>
                                </div>
                                <div class="fs-14 light-gray-color">Ex: Vladimir Alexandrovich (First name, Last name)</div>
                            </div>
                            <div class="padding-bottom-30 field-parent">
                                <div class="custom-google-label-style module" data-input-blue-green-border="true">
                                    <label for="dentist-register-alternative-name">Alternative Spelling (optional):</label>
                                    <input class="full-rounded form-field" name="alternative-name" maxlength="100" type="text" id="dentist-register-alternative-name"/>
                                </div>
                                <div class="fs-14 light-gray-color">Ex: Владимир Александрович</div>
                            </div>
                            <div class="privacy-policy-row padding-bottom-20">
                                <div class="pretty p-svg p-curve">
                                    <input type="checkbox" id="privacy-policy-registration"/>
                                    <div class="state p-success">
                                        <svg class="svg svg-icon" viewBox="0 0 20 20">
                                            <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                        </svg>
                                        <label class="fs-14 padding-left-5">I've read and agree to the <a href="//dentacoin.com/privacy-policy" target="_blank">Privacy Policy</a></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="step third address-suggester-wrapper" data-step="third">
                            <div class="padding-bottom-20 field-parent">
                                <div class="custom-google-select-style module">
                                    <label>Select country:</label>
                                    <select name="country-code" id="dentist-country" class="form-field required country-select">
                                        @php($current_phone_code = '+')
                                        @php($client_ip = (new \App\Http\Controllers\Controller())->getClientIp())
                                        @if(isset($client_ip) && $client_ip != '127.0.0.1')
                                            @php($current_user_country_code = mb_strtolower(trim(file_get_contents('http://ipinfo.io/' . $client_ip . '/country'))))
                                        @endif
                                        @php($countries = (new \App\Http\Controllers\APIRequestsController())->getAllCountries())
                                        @if(!empty($countries))
                                            @foreach($countries as $country)
                                                @php($selected = '')
                                                @if(!empty($current_user_country_code))
                                                    @if($current_user_country_code == $country->code)
                                                        @php($current_phone_code = $current_phone_code.$country->phone_code)
                                                        @php($selected = 'selected')
                                                    @endif
                                                @endif
                                                <option value="{{$country->code}}" data-code="{{$country->phone_code}}" {{$selected}}>{{$country->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="padding-bottom-15 suggester-parent module field-parent">
                                <div class="custom-google-label-style module" data-input-blue-green-border="true">
                                    <label for="dentist-register-address">Address: Start typing street, No, city</label>
                                    <input type="text" name="address" class="full-rounded form-field required address-suggester dont-init" autocomplete="off" id="dentist-register-address">
                                </div>
                                <div class="suggester-map-div margin-top-15 margin-bottom-10"></div>
                                <div class="alert alert-notice geoip-confirmation margin-top-10 margin-bottom-10 hide-this">Please check the map to make sure we got your correct address. If you're not happy - please drag the map to adjust it.</div>
                                <div class="alert alert-warning geoip-hint margin-top-10 margin-bottom-10">Please enter a valid address for your practice (including street name and number)</div>
                            </div>
                            <div class="padding-bottom-15 field-parent">
                                <div class="custom-google-label-style module" data-input-blue-green-border="true">
                                    <label for="dentist-register-website">Website: http(s)://:</label>
                                    <input class="full-rounded form-field required" name="website" id="dentist-register-website" maxlength="250" type="url"/>
                                </div>
                                <div class="fs-14 light-gray-color">No website? Add your most popular social page.</div>
                            </div>
                            <div class="padding-bottom-10 field-parent">
                                <div class="phone">
                                    <div class="country-code" name="phone-code">{{$current_phone_code}}</div>
                                    <div class="custom-google-label-style module input-phone" data-input-blue-green-border="true">
                                        <label for="dentist-register-phone">Phone number:</label>
                                        <input class="full-rounded form-field required" name="phone" maxlength="50" type="number" id="dentist-register-phone"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="step fourth" data-step="fourth">
                            <div class="padding-bottom-20 fs-0">
                                <div class="inline-block-top avatar module upload-file">
                                    <input type="file" class="visualise-image inputfile" id="custom-upload-avatar" name="image" accept=".jpg,.png,.jpeg,.svg,.bmp"/>
                                    <div class="btn-wrapper"></div>
                                    <div class="fs-14 padding-top-5 italic">Max size: 2MB</div>
                                </div>
                                <div class="inline-block-top specializations">
                                    <h4>Please select your specializations:</h4>
                                    @foreach($api_enums->specialisations as $key => $specialisation)
                                        <div class="pretty p-svg p-curve margin-bottom-10">
                                            <input type="checkbox" name="specializations[]" value="{{$key}}"/>
                                            <div class="state p-success">
                                                <!-- svg path -->
                                                <svg class="svg svg-icon" viewBox="0 0 20 20">
                                                    <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                                </svg>
                                                <label class="fs-14 padding-left-5">{{$specialisation}}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="fs-0 captcha-parent padding-bottom-15 padding-top-20">
                                    <div class="inline-block width-50 width-xs-100 padding-bottom-xs-15">
                                        <div class="captcha-container flex text-center">
                                            <span>{!! captcha_img() !!}</span>
                                            <button type="button" class="refresh-captcha">
                                                <i class="fa fa-refresh" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="inline-block fs-14 width-50 width-xs-100 padding-left-10">
                                        <div class="custom-google-label-style module" data-input-blue-green-border="true">
                                            <label for="register-captcha">Enter captcha:</label>
                                            <input type="text" name="captcha" id="register-captcha" maxlength="5" class="full-rounded form-field"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="step-errors-holder padding-top-10"></div>
                            </div>
                        </div>
                        <div class="btns-container">
                            <div class="inline-block">
                                <input type="button" value="< back" class="prev-step"/>
                            </div>
                            <div class="inline-block text-right">
                                <input type="button" value="Next" class="white-light-blue-btn small fs-20 next-step" data-current-step="first"/>
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                @if(isset($inviter))
                                    <input type="hidden" name="inviter" value="{{\Illuminate\Support\Facades\Input::get('inviter')}}">
                                @endif
                            </div>
                        </div>
                    </form>
                    <div class="popup-half-footer">
                        Already have an account? <a href="javascript:void(0)" class="call-log-in">Log in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(!empty(session('logout_token')))
        <img src="//dentacoin.com/custom-cookie?logout-token={{ urlencode(session('logout_token')) }}" class="hide"/>
        <img src="//assurance.dentacoin.com/custom-cookie?logout-token={{ urlencode(session('logout_token')) }}" class="hide"/>
        <img src="//reviews.dentacoin.com/custom-cookie?logout-token={{ urlencode(session('logout_token')) }}" class="hide"/>
        <img src="//dentavox.dentacoin.com/custom-cookie?logout-token={{ urlencode(session('logout_token')) }}" class="hide"/>
        <img src="//account.dentacoin.com/custom-cookie?logout-token={{ urlencode(session('logout_token')) }}" class="hide"/>
    @endif
@else
    @php($slug = (new \App\Http\Controllers\Controller())->encrypt(session('logged_user')['id'], getenv('API_ENCRYPTION_METHOD'), getenv('API_ENCRYPTION_KEY')))
    @php($type = (new \App\Http\Controllers\Controller())->encrypt(session('logged_user')['type'], getenv('API_ENCRYPTION_METHOD'), getenv('API_ENCRYPTION_KEY')))
    @php($token = (new \App\Http\Controllers\Controller())->encrypt(session('logged_user')['token'], getenv('API_ENCRYPTION_METHOD'), getenv('API_ENCRYPTION_KEY')))
    <img src="//dentacoin.com/custom-cookie?slug={{ urlencode($slug) }}&type={{ urlencode($type) }}&token={{ urlencode($token) }}" class="hide"/>
    <img src="//assurance.dentacoin.com/custom-cookie?slug={{ urlencode($slug) }}&type={{ urlencode($type) }}&token={{ urlencode($token) }}" class="hide"/>
    <img src="//dentists.dentacoin.com/custom-cookie?slug={{ urlencode($slug) }}&type={{ urlencode($type) }}&token={{ urlencode($token) }}" class="hide"/>
    <img src="//reviews.dentacoin.com/custom-cookie?slug={{ urlencode($slug) }}&type={{ urlencode($type) }}&token={{ urlencode($token) }}" class="hide"/>
    <img src="//dentavox.dentacoin.com/custom-cookie?slug={{ urlencode($slug) }}&type={{ urlencode($type) }}&token={{ urlencode($token) }}" class="hide"/>
    <img src="//account.dentacoin.com/custom-cookie?slug={{ urlencode($slug) }}&type={{ urlencode($type) }}&token={{ urlencode($token) }}" class="hide"/>
@endif--}}

<div class="response-layer">
    <div class="wrapper">
        <figure itemscope="" itemtype="http://schema.org/ImageObject">
            <img src="/assets/images/loader.gif" class="max-width-160" alt="Loader">
        </figure>
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCaVeHq_LOhQndssbmw-aDnlMwUG73yCdk&libraries=places&language=en"></script>
<script src="https://dentacoin.com/assets/js/basic.js?v=1.0.6"></script>
<script src="/dist/js/front-libs-script.js?v=1.0.6"></script>
{{--<script src="/dist/js/front-script.js?v=1.0.6"></script>--}}

{{--Load social logging scripts only if user is not logged--}}
@if(!(new \App\Http\Controllers\UserController())->checkSession() && !empty(Route::current()) && Route::current()->getName() == 'withdraw-dentacare-dcn')
    <script src="//dentacoin.com/assets/libs/civic-login/civic.js?v=1.0.6"></script>
    <script src="//dentacoin.com/assets/libs/facebook-login/facebook.js?v=1.0.6"></script>

    @php($slow_login_form = \Illuminate\Support\Facades\Input::get('show-login'))
@endif

@yield("script_block")
<script src="/dist/js/front-script.js"></script>

{{--Multiple errors from laravel validation--}}
@if(!empty($errors) && count($errors) > 0)
    <script>
        var errors = '';
        @foreach($errors->all() as $error)
            errors+="{{ $error }}" + '<br>';
        @endforeach
        basic.showAlert(errors, '', true);
    </script>
@endif

{{--Single error from controller response--}}
@if (session('error'))
    <script>
        basic.showAlert("{!! session('error') !!}", '', true);
    </script>
@endif

{{--Multiple errors from controller response--}}
@if(session('errors_response') && count(session('errors_response')) > 0)
    <script>
        var errors = '';
        @foreach(session('errors_response') as $error)
            errors+="{{ $error }}" + '<br>';
        @endforeach
        basic.showAlert(errors, '', true);
    </script>
@endif

{{--Success from controller response--}}
@if(session('success'))
    @if(session('popup-html'))
        <script>
            basic.showDialog('{!! session('popup-html') !!}', 'popup-html', null, true);
            $('.close-popup').click(function() {
                basic.closeDialog();
            });
        </script>
    @else
        <script>
            basic.showAlert("{!! session('success') !!}", '', true);
        </script>
    @endif
@endif

</body>
</html>