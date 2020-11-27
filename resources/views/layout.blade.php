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

    @if(empty($_COOKIE['performance_cookies']) && empty($_COOKIE['functionality_cookies']) && empty($_COOKIE['marketing_cookies']) && empty($_COOKIE['strictly_necessary_policy']))
        <link rel="stylesheet" type="text/css" href="https://dentacoin.com/assets/libs/dentacoin-package/css/style-cookie.css?v={{time()}}">
    @endif
    
    <style>

    </style>
    <link rel="stylesheet" type="text/css" href="/dist/css/front-libs-style.css?v=1.0.10">
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css?v=1.0.10">
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
<body class="@if(!empty(Route::current())) {{Route::current()->getName()}} @else class-404 @endif ">

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
            </div>
        </div>
    </header>
    <main>@yield('content')</main>
    <footer class="padding-bottom-30 padding-top-40 margin-top-20 container border-top @if(empty($_COOKIE['hide-holiday-calendar-banner']) && strtotime('2020/12/01 00:00:00') < time())) extra-bottom-padding @endif">
        <div class="row fs-0">
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
        <div class="row color-main">
            <div class="col-xs-12 text-center fs-14 padding-top-20">
                © {{date('Y')}} Dentacoin Foundation. All rights reserved.
                <div><a href="//dentacoin.com/assets/uploads/dentacoin-foundation.pdf" class="text-decoration" target="_blank">Verify Dentacoin Foundation</a> | <a href="//dentacoin.com/privacy-policy" target="_blank" class="text-decoration">Privacy Policy</a></div>
            </div>
        </div>
    </footer>

    @if((empty($_COOKIE['hide-holiday-calendar-banner']) && strtotime('2020/12/01 00:00:00') < time()) || !empty($_COOKIE['test-holiday-calendar-banner']))
        <div class="bottom-fixed-promo-banner fs-0">
            <a href="javascript:void(0);" class="close-banner">×</a>
            <a href="https://dentacoin.com/holiday-calendar/2020" target="_blank">
                <div itemprop="video" itemscope="" itemtype="http://schema.org/VideoObject">
                    <video muted autoplay loop>
                        <source src="https://dentacoin.com/assets/videos/dentacoin-christmas-calendar-banner.mp4" type="video/mp4">
                        Your browser does not support HTML5 video.
                    </video>
                    <meta itemprop="name" content="Dentacoin Holiday Calendar Video">
                    <meta itemprop="description" content="Holiday Calendar 2020 campaign video">
                    <meta itemprop="uploadDate" content="2020-11-30T08:00:00+08:00">
                    <meta itemprop="thumbnailUrl" content="https://dentacoin.com/assets/uploads/video-poster.png">
                    <link itemprop="contentURL" href="https://dentacoin.com/assets/videos/dentacoin-christmas-calendar-banner.mp4">
                </div>
            </a>
        </div>
    @endif

<div class="response-layer">
    <div class="wrapper">
        <figure itemscope="" itemtype="http://schema.org/ImageObject">
            <img src="/assets/images/loader.gif" class="max-width-160" alt="Loader">
        </figure>
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCaVeHq_LOhQndssbmw-aDnlMwUG73yCdk&libraries=places&language=en"></script>
<script src="https://dentacoin.com/assets/js/basic.js?v=1.0.10"></script>
<script src="/dist/js/front-libs-script.js?v=1.0.10"></script>

@if(empty($_COOKIE['performance_cookies']) && empty($_COOKIE['functionality_cookies']) && empty($_COOKIE['marketing_cookies']) && empty($_COOKIE['strictly_necessary_policy']))
    <script src="https://dentacoin.com/assets/libs/dentacoin-package/js/init.js?v={{time()}}"></script>
@endif

{{--<script src="/dist/js/front-script.js?v=1.0.10"></script>--}}

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