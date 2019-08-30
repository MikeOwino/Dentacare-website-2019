@extends("layout")
@section("content")
    <section class="section-dentacare-sign-in">
        <div class="container">
            <div class="row fs-0 padding-top-30">
                <div class="col-xs-12 col-lg-7 col-lg-offset-1 col-md-8 inline-block-top upgradeable-html">
                    <h1 class="lato-regular fs-55 fs-xs-30 fs-sm-40 padding-top-30 padding-top-xs-0 padding-bottom-10">USING DENTACARE FOR IOS?</h1>
                    <h2 class="lato-bold fs-40 line-height-45 line-height-24 fs-xs-24 fs-sm-32 padding-bottom-20">Enter your app account to redeem Dentapoints!</h2>
                    <div class="padding-bottom-10">
                        <a href="javascript:void(0)" class="inline-block facebook-dentacare-btn padding-right-10 padding-bottom-10">
                            <figure class="inline-block max-width-240" itemscope="" itemtype="http://schema.org/ImageObject">
                                <img alt="Facebook button" class="width-100" src="/assets/images/facebook-sign-in.png">
                            </figure>
                        </a>
                        {{--<a href="javascript:void(0)" class="inline-block google-dentacare-btn padding-bottom-10">
                            <figure class="inline-block max-width-240" itemscope="" itemtype="http://schema.org/ImageObject">
                                <img alt="Facebook button" class="width-100" src="/assets/images/google-sign-in.png">
                            </figure>
                        </a>--}}
                    </div>
                    <form id="dentacare-sign-in">
                        <div class="padding-bottom-20 field-parent max-width-500">
                            <div class="custom-google-label-style module" data-input-blue-green-border="true">
                                <label for="dentacare-email">Email:</label>
                                <input type="text" name="email" id="dentacare-email" maxlength="50" class="full-rounded form-field"/>
                            </div>
                        </div>
                        <div class="padding-bottom-30 field-parent max-width-500">
                            <div class="custom-google-label-style module" data-input-blue-green-border="true">
                                <label for="dentacare-password">Password:</label>
                                <input type="password" name="password" id="dentacare-password" maxlength="50" class="full-rounded form-field"/>
                            </div>
                        </div>
                        <div>
                            <input type="submit" value="SIGN IN" class="white-light-blue-btn"/>
                        </div>
                    </form>
                </div>
                <div class="col-xs-12 col-lg-3 col-md-4 inline-block-top text-right padding-bottom-200 padding-bottom-xs-50">
                    <figure class="inline-block" itemscope="" itemtype="http://schema.org/ImageObject">
                        <img alt="First brush phone image" class="width-100" src="/assets/uploads/third-animated-phone.png">
                    </figure>
                </div>
            </div>
        </div>
    </section>
@endsection