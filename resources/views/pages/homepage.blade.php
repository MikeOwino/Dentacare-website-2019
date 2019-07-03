@extends("layout")
@section("content")
    <section class="section-intro">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-5 padding-top-60 padding-top-xs-10 min-height-left padding-top-sm-20 padding-top-md-30">
                    <figure itemscope="" itemtype="http://schema.org/Organization" class="padding-bottom-150 padding-bottom-sm-50 150 padding-bottom-md-50 padding-bottom-xs-20">
                        <a itemprop="url" href="{{ route('home') }}">
                            <img src="/assets/uploads/dentacare-logo.svg" itemprop="logo" class="max-width-240 max-width-xs-120" alt="Dentacare logo"/>
                        </a>
                    </figure>
                    <h1 class="fs-55 fs-sm-45 fs-xs-26 text-center-xs padding-right-xs-0 line-height-sm-50 line-height-70 line-height-xs-30 color-white padding-right-50 padding-right-sm-15 padding-right-md-15 padding-top-xs-25">Improve Your Oral Care <br class="show-only-on-xs"> and Earn Rewards!</h1>
                    <h3 class="fs-30 fs-xs-16 text-center-xs color-white padding-top-100 padding-top-xs-25 padding-bottom-20 padding-bottom-xs-10 padding-top-sm-50 padding-top-md-50">Download now to start earning:</h3>
                    <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block android-btn width-xs-100 text-center-xs padding-right-20 padding-right-xs-0 padding-bottom-xs-10">
                        <a href="https://play.google.com/store/apps/details?id=com.dentacoin.dentacare&hl=en" target="_blank">
                            <img src="/assets/uploads/google-play-badge.svg" class="width-100 max-width-200" alt="Googe play icon"/>
                        </a>
                    </figure>
                    <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block ios-btn width-xs-100 text-center-xs padding-top-sm-10 padding-top-md-10">
                        <a href="https://itunes.apple.com/bg/app/dentacare-health-training/id1274148338?mt=8" target="_blank">
                            <img src="/assets/uploads/app-store.svg" class="width-100 max-width-200" alt="App store icon"/>
                        </a>
                    </figure>
                </div>
                <div class="col-xs-12 col-sm-6 col-sm-offset-1 moving-phones-parent">
                    <div class="moving-phones-container padding-top-10 fs-0">
                        <div class="left-side inline-block">
                            <figure itemscope="" itemtype="http://schema.org/ImageObject">
                                <img src="/assets/uploads/first-animated-phone.png" class="first-phone" alt="First animated phone"/>
                            </figure>
                            <figure itemscope="" itemtype="http://schema.org/ImageObject">
                                <img src="/assets/uploads/second-animated-phone.png" class="second-phone" alt="Second animated phone"/>
                            </figure>
                        </div>
                        <div class="right-side inline-block">
                            <figure itemscope="" itemtype="http://schema.org/ImageObject">
                                <img src="/assets/uploads/third-animated-phone.png" class="third-phone" alt="Third animated phone"/>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="hidden-phones-container padding-bottom-xs-15">
                    <figure itemscope="" itemtype="http://schema.org/ImageObject">
                        <img src="/assets/uploads/phones-mobile-768px.png" class="width-100" alt="Phones mobile 768px"/>
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <section class="section-benefits">
        <div class="container">
            <div class="row fs-0">
                <div class="col-xs-12"><h2 class="fs-45 fs-xs-35 padding-bottom-20 text-center-xs">BENEFITS</h2></div>
                <div class="col-xs-12 col-sm-8 col-md-6 inline-block-bottom padding-bottom-100 padding-bottom-xs-20">
                    <div class="single-benefit fs-0 padding-top-50 padding-bottom-50 padding-top-xs-30 padding-bottom-xs-30">
                        <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block max-width-200 padding-right-50 padding-right-xs-0 max-width-xs-none width-100 padding-bottom-xs-20 text-center-xs">
                            <img src="/assets/uploads/benefits-icon-1.svg" alt="Benefits icon 1"/>
                        </figure>
                        <div class="inline-block benefit-text text-center-xs width-xs-100">
                            <h3 class="fs-30 lato-bold padding-bottom-15"><span class="color-light-blue">01. Improve</span> your oral hygiene</h3>
                            <div class="fs-18 lato-light">Learn how to maintain proper hygiene while having fun! Reminders, notifications, voice navigation, music accompaniment and tutorials will guide you through your 90-day journey.</div>
                        </div>
                    </div>
                    <div class="single-benefit fs-0 padding-top-50 padding-bottom-50 padding-top-xs-30 padding-bottom-xs-30">
                        <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block max-width-200 padding-right-50 padding-right-xs-0 max-width-xs-none width-100 padding-bottom-xs-20 text-center-xs">
                            <img src="/assets/uploads/benefits-icon-2.svg" alt="Benefits icon 2"/>
                        </figure>
                        <div class="inline-block benefit-text text-center-xs width-xs-100">
                            <h3 class="fs-30 lato-bold padding-bottom-15"><span class="color-light-blue">02. Form</span> long-lasting habits</h3>
                            <div class="fs-18 lato-light">“Motivation is what gets you started. Habit is what keeps you going.” As your personal dental care companion, Dentacare will help you turn good practices into a routine for healthy teeth.</div>
                        </div>
                    </div>
                    <div class="single-benefit fs-0 padding-top-50 padding-bottom-50 padding-top-xs-30 padding-bottom-xs-30">
                        <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block max-width-200 padding-right-50 padding-right-xs-0 max-width-xs-none width-100 padding-bottom-xs-20 text-center-xs">
                            <img src="/assets/uploads/benefits-icon-3.svg" alt="Benefits icon 3"/>
                        </figure>
                        <div class="inline-block benefit-text text-center-xs width-xs-100">
                            <h3 class="fs-30 lato-bold padding-bottom-15"><span class="color-light-blue">03. Get rewards</span> in the first dental coin</h3>
                            <div class="fs-18 lato-light">Completing your 90-day journey will earn you Dentacoin (DCN) tokens you can use to cover dental treatments, buy various gift cards, or exchange them to crypto/ traditional currencies.</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-6 inline-block-bottom text-right right-mobile-phone">
                    <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block">
                        <img src="/assets/uploads/third-animated-phone.png" class="width-50 width-sm-100 width-xs-100" alt="First brush phone image"/>
                    </figure>
                </div>
            </div>
        </div>
    </section>
    [shortcode type="testimonials"]
    <section class="section-90-day-oral-care-journey padding-top-100 padding-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h2 class="fs-45 fs-xs-35 line-height-45">START YOUR 90-DAY ORAL CARE JOURNEY</h2>
                    <h3 class="fs-32 fs-xs-22 padding-bottom-40">and earn rewards along the way!</h3>
                </div>
                <div class="col-xs-12">
                    [shortcode type="oral-care-journey-slider"]
                </div>
                <div class="col-xs-12 text-center">
                    <div class="fs-26 padding-bottom-10 padding-top-40">Download now to start earning:</div>
                    <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block android-btn display-block-xs padding-right-20 padding-right-xs-0">
                        <a href="https://play.google.com/store/apps/details?id=com.dentacoin.dentacare&hl=en" target="_blank">
                            <img src="/assets/uploads/google-play-badge.svg" class="width-100 max-width-200" alt="Googe play icon"/>
                        </a>
                    </figure>
                    <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block ios-btn display-block-xs padding-top-xs-15">
                        <a href="https://itunes.apple.com/bg/app/dentacare-health-training/id1274148338?mt=8" target="_blank">
                            <img src="/assets/uploads/app-store.svg" class="width-100 max-width-200" alt="App store icon"/>
                        </a>
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <section class="section-children-are-loving-it">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 color-white text-center padding-top-70 padding-bottom-15">
                    <h2 class="fs-45 fs-xs-35 line-height-45">CHILDREN ARE LOVING IT:</h2>
                    <h3 class="fs-32 fs-xs-22">Form oral hygiene habits while playing a fun card game</h3>
                </div>
            </div>
        </div>
        <div class="full-width-image-container">
            <picture itemscope="" itemtype="http://schema.org/ImageObject">
                <source media="(max-width: 768px)" srcset="/assets/uploads/children-are-loving-it-mobile-background.png">
                <img class="width-100" alt="Children are loving it" itemprop="contentUrl" src="/assets/uploads/children-are-loving-it-background.png">
            </picture>
            <div class="absolute-content text-center">
                <div class="fs-28 fs-xs-20 padding-bottom-15">Coming soon:</div>
                <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block android-btn width-xs-100 padding-right-15 padding-right-xs-0">
                    <img src="/assets/uploads/gray-google-play-btn.png" class="max-width-240 max-width-xs-210" alt="Google Play button"/>
                </figure>
                <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block ios-btn width-xs-100 padding-top-xs-15">
                    <img src="/assets/uploads/gray-apple-store-btn.png" class="max-width-240 max-width-xs-210" alt="App Store button"/>
                </figure>
            </div>
        </div>
    </section>
@endsection
