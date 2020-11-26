console.log('Don\'t touch the code. Or do ... ¯\\_(ツ)_/¯');

$(document).ready(function() {

});

$(window).on('load', function() {

});

$(window).on('resize', function(){

});

$(window).on('scroll', function()  {

});

var mobile_os = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    }
};

if(mobile_os.iOS()) {
    $('.android-btn').remove();
} else if(mobile_os.Android()) {
    $('.ios-btn').remove();
}

// init bootstrap tooltips
function initTooltips() {
    if($('[data-toggle="tooltip"]')) {
        $('[data-toggle="tooltip"]').tooltip();
    }
}

function initCaptchaRefreshEvent()  {
//refreshing captcha on trying to log in admin
    if($('.refresh-captcha').length > 0)    {
        $('.refresh-captcha').click(function()  {
            $.ajax({
                type: 'GET',
                url: '/refresh-captcha',
                dataType: 'json',
                success: function (response) {
                    $('.captcha-container span').html(response.captcha);
                }
            });
        });
    }
} 
initCaptchaRefreshEvent();

//PAGES LOGIC
if($('body').hasClass('home')) {
    if($('.moving-phones-container').length) {
        $('body').addClass('overflow-hidden');
        if($(window).width() > 768) {
            setTimeout(function() {
                $('.moving-phones-container').animate({
                    'left' : '0'
                }, 1500, null, function() {
                    $('.first-phone').addClass('right-rotation');
                    $('.second-phone').addClass('right-rotation');
                    $('.third-phone').addClass('left-rotation');

                    $('.moving-phones-container').addClass('move-back-top');
                });
            }, 1000);
        }
        $('body').removeClass('overflow-hidden');
    }

    if($('.testimonials-slider').length > 0) {
        $('.testimonials-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 8000,
            adaptiveHeight: true
        });
    }

    if($('.oral-care-journey-slider .init-slider').length > 0) {
        $('.oral-care-journey-slider .init-slider').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 4000,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    }
} else if($('body').hasClass('dentacare-password-reset')) {
    if ($('form#dentacare-password-reset-form').length) {
        $('form#dentacare-password-reset-form').on('submit', function(event) {
            event.preventDefault();
            var this_form_native = this;
            var this_form = $(this_form_native);

            var errors = false;
            this_form.find('.error-handle').remove();

            if(this_form.find('input[name="password"]').val().trim() == '') {
                customErrorHandle(this_form.find('input[name="password"]').closest('.field-parent'), 'This field is required.');
                errors = true;
            } else if (this_form.find('input[name="password"]').val().trim().length < 6 || this_form.find('input[name="password"]').val().trim().length > 20) {
                customErrorHandle(this_form.find('input[name="password"]').closest('.field-parent'), 'Password must contain between 6 and 20 symbols.');
                errors = true;
            }

            if(this_form.find('input[name="repeat-password"]').val().trim() == '') {
                customErrorHandle(this_form.find('input[name="repeat-password"]').closest('.field-parent'), 'This field is required.');
                errors = true;
            } else if (this_form.find('input[name="repeat-password"]').val().trim().length < 6 || this_form.find('input[name="repeat-password"]').val().trim().length > 20) {
                customErrorHandle(this_form.find('input[name="repeat-password"]').closest('.field-parent'), 'Password must contain between 6 and 20 symbols.');
                errors = true;
            }

            if(this_form.find('input[name="password"]').val().trim() != '' && this_form.find('input[name="repeat-password"]').val().trim() != '' && this_form.find('input[name="password"]').val().trim() != this_form.find('input[name="repeat-password"]').val().trim()) {
                customErrorHandle(this_form.find('input[name="repeat-password"]').closest('.field-parent'), 'Both passwords don\'t match.');
                errors = true;
            }

            if (!errors) {
                this_form_native.submit();
            }
        });
    }
} else if($('body').hasClass('withdraw-dentacare-dcn')) {
    //facebook application init
    window.fbAsyncInit = function () {
        FB.init({
            appId: '1500240286681345',
            cookie: true,
            xfbml: true,
            version: 'v2.10'
        });
        FB.AppEvents.logPageView();
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = '//connect.facebook.net/bg_BG/sdk.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    //binding click event for facebook login btn
    $('body').on('click', '.facebook-dentacare-btn', function(rerequest) {
        //asking users only for email
        var obj = {
            scope: 'email'
        };
        if(rerequest){
            obj.auth_type = 'rerequest';
        }
        FB.login(function (response) {
            if(response.authResponse) {
                var fb_token = response.authResponse.accessToken;


                $('.response-layer').show();
                setTimeout(function() {
                    FB.api('/me?fields=id,email,name,permissions', function (response) {
                        //console.log(response);
                        var logger_email;
                        var logger_fb_id = response.id;
                        if(response.email == null) {
                            basic.showAlert('Please go to your facebook account privacy settings and make your email public. Without giving us access to your email we cannot proceed with the login.', '', true);
                            $('.response-layer').hide();
                            return true;
                        } else{
                            logger_email = response.email;
                        }

                        $.ajax({
                            type: 'POST',
                            url: '/social-authenticate-dentacare-user',
                            dataType: 'json',
                            data: {
                                email: logger_email,
                                user_id: logger_fb_id,
                                token: fb_token
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (response) {
                                successfulUserLogin(response);
                            }
                        });
                    });
                }, 1000);
            }
        }, obj);
    });

    //binding click event for google login btn
    $('body').on('click', '.google-dentacare-btn', function() {
        if(basic.cookies.get('social-allowed') == '') {
            basic.showAlert('Coming soon.', '', true);
            return false;
        }
    });

    $('form#dentacare-sign-in').on('submit', function(event) {
        event.preventDefault();
        var this_form = $(this);
        this_form.find('.error-handle').remove();
        var form_fields = this_form.find('.form-field');
        var submit_form = true;

        for(var i = 0, len = form_fields.length; i < len; i+=1) {
            if(form_fields.eq(i).val().trim() == '') {
                customErrorHandle(form_fields.eq(i).closest('.field-parent'), 'This field is required.');
                submit_form = false;
            } else if(form_fields.eq(i).attr('name') == 'email' && !basic.validateEmail(form_fields.eq(i).val().trim())) {
                customErrorHandle(form_fields.eq(i).closest('.field-parent'), 'Please use valid email address.');
                submit_form = false;
            }
        }

        if(submit_form) {
            $('.response-layer').show();
            setTimeout(function() {
                $.ajax({
                    type: 'POST',
                    url: '/authenticate-dentacare-user',
                    dataType: 'json',
                    data: {
                        email: this_form.find('input[name="email"]').val().trim(),
                        password: this_form.find('input[name="password"]').val().trim()
                    },
                    success: function (response) {
                        successfulUserLogin(response);
                    }
                });
            }, 1000);
        }
    });
}

function successfulUserLogin(response) {
    $('.response-layer').hide();
    basic.closeDialog();
    if(response.success) {
        if(response.upgradeable_content) {
            $('.upgradeable-html').html(response.upgradeable_content);

            $('form#dentacare-withdraw').on('submit', function(event) {
                event.preventDefault();
                var this_withdraw_form = $(this);
                this_withdraw_form.find('.error-handle').remove();
                var withdraw_form_fields = this_withdraw_form.find('.form-field');
                var submit_withdraw_form = true;

                if(this_withdraw_form.attr('data-stoppage') == 'true') {
                    customErrorHandle(this_withdraw_form, 'You don\'t have any DCN balance at the moment.');
                    submit_withdraw_form = false;
                }

                for (var y = 0, withdraw_form_len = withdraw_form_fields.length; y < withdraw_form_len; y+=1) {
                    if (withdraw_form_fields.eq(y).val().trim() == '') {
                        customErrorHandle(withdraw_form_fields.eq(y).closest('.field-parent'), 'This field is required.');
                        submit_withdraw_form = false;
                    } else if(withdraw_form_fields.eq(y).attr('name') == 'dentacare-address' && withdraw_form_fields.eq(y).val().trim().length != 42) {
                        customErrorHandle(withdraw_form_fields.eq(y).closest('.field-parent'), 'Please use valid Wallet Address.');
                        submit_withdraw_form = false;
                    }
                }

                if (submit_withdraw_form) {
                    $('.response-layer').show();

                    setTimeout(function() {
                        fireGoogleAnalyticsEvent('Withdraw', 'Collect', 'Rewards', response.amount);

                        $.ajax({
                            type: 'POST',
                            url: '/submit-withdraw-dentacare-dcn',
                            dataType: 'json',
                            data: {
                                token: response.token,
                                amount: response.amount,
                                address: this_withdraw_form.find('input[name="dentacare-address"]').val().trim()
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (withdraw_response) {
                                $('.response-layer').hide();
                                basic.closeDialog();

                                if(withdraw_response.success) {
                                    this_withdraw_form.find('input[name="dentacare-address"]').val('');
                                    basic.showAlert(withdraw_response.success, '', true);
                                } else if(withdraw_response.error) {
                                    basic.showAlert(withdraw_response.error, '', true);
                                }
                            }
                        });
                    }, 1000);
                }
            });

        } else {
            basic.showAlert(response.success, '', true);
        }
    } else if(response.error) {
        basic.showAlert(response.error, '', true);
    }
}

//on button click next time when you hover the button the color is bugged until you click some other element (until you move out the focus from this button)
function fixButtonsFocus() {
    $(document).on('click', '.light-blue-white-btn', function() {
        $(this).blur();
    });
    $(document).on('click', '.white-light-blue-btn', function() {
        $(this).blur();
    });
}
fixButtonsFocus();

function hidePopupOnBackdropClick() {
    $(document).on('click', '.bootbox', function(){
        var classname = event.target.className;
        classname = classname.replace(/ /g, '.');

        if(classname && !$('.' + classname).parents('.modal-dialog').length) {
            if($('.bootbox.login-signin-popup').length) {
                $('.hidden-login-form').html(hidden_popup_content);
            }
            if($('.bootbox.login-signin-popup').length) {
                $('.hidden-login-form').html(hidden_popup_content);
            }
            bootbox.hideAll();
        }
    });
}
hidePopupOnBackdropClick();

//INIT LOGIC FOR ALL STEPS
function customErrorHandle(el, string) {
    el.append('<div class="error-handle">'+string+'</div>');
}

function bindGoogleAlikeButtonsEvents() {
    //google alike style for label/placeholders
    $('body').on('click', '.custom-google-label-style label', function() {
        $(this).addClass('active-label');
        if($('.custom-google-label-style').attr('data-input-colorful-border') == 'true') {
            $(this).parent().find('input').addClass('blue-green-border');
        }
    });

    $('body').on('keyup change focusout', '.custom-google-label-style input', function() {
        var value = $(this).val().trim();
        if (value.length) {
            $(this).closest('.custom-google-label-style').find('label').addClass('active-label');
            if($(this).closest('.custom-google-label-style').attr('data-input-colorful-border') == 'true') {
                $(this).addClass('blue-green-border');
            }
        } else {
            $(this).closest('.custom-google-label-style').find('label').removeClass('active-label');
            if($(this).closest('.custom-google-label-style').attr('data-input-colorful-border') == 'true') {
                $(this).removeClass('blue-green-border');
            }
        }
    });
}
bindGoogleAlikeButtonsEvents();

//check if object has property
function has(object, key) {
    return object ? hasOwnProperty.call(object, key) : false;
}

// =================================== GOOGLE ANALYTICS TRACKING LOGIC ======================================

function fireGoogleAnalyticsEvent(category, action, label, value) {
    var event_obj = {
        'event_category': category,
        'event_action' : action,
        'event_label': label
    };

    if(value != undefined) {
        event_obj.value = value;
    }

    gtag('event', label, event_obj);
}

function bindJawsOfBattleGooglePlayBtnClick() {
    $(document).on('click', '.jaws-of-battle-google-play-btn-click', function(event) {
        event.preventDefault();
        fireGoogleAnalyticsEvent('Jaws', 'Click', 'Google Play');
        fbq('track', 'JawsGooglePlay');

        window.open($(this).attr('href'));
    });
}
bindJawsOfBattleGooglePlayBtnClick();

function bindJawsOfBattleAppStoreBtnClick() {
    $(document).on('click', '.jaws-of-battle-app-store-btn-click', function(event) {
        event.preventDefault();
        fireGoogleAnalyticsEvent('Jaws', 'Click', 'Apple');
        fbq('track', 'JawsAppStore');

        window.open($(this).attr('href'));
    });
}
bindJawsOfBattleAppStoreBtnClick();

function bindDentacareGooglePlayBtnClick() {
    $(document).on('click', '.dentacare-google-play-btn-click', function(event) {
        event.preventDefault();
        fireGoogleAnalyticsEvent('Download', 'Click', 'Google Play');
        fbq('track', 'DentaGooglePlay');

        window.open($(this).attr('href'));
    });
}
bindDentacareGooglePlayBtnClick();

function bindDentacareAppStoreBtnClick() {
    $(document).on('click', '.dentacare-app-store-btn-click', function(event) {
        event.preventDefault();
        fireGoogleAnalyticsEvent('Download', 'Click', 'Apple');
        fbq('track', 'DentaAppStore');

        window.open($(this).attr('href'));
    });
}
bindDentacareAppStoreBtnClick();

function bindTRPLinkTracker() {
    $(document).on('click', '.trp-link-tracker', function(event) {
        event.preventDefault();
        fireGoogleAnalyticsEvent('Tools', 'Click', 'TRP');

        window.open($(this).attr('href'));
    });
}
bindTRPLinkTracker();

function bindDVLinkTracker() {
    $(document).on('click', '.vox-link-tracker', function(event) {
        event.preventDefault();
        fireGoogleAnalyticsEvent('Tools', 'Click', 'Vox');

        window.open($(this).attr('href'));
    });
}
bindDVLinkTracker();

// =================================== /GOOGLE ANALYTICS TRACKING LOGIC ======================================

if (typeof(dcnCookie) != 'undefined') {
    dcnCookie.init({
        'google_app_id' : 'UA-97167262-5',
        'fb_app_id' : '2366034370318681'
    });
}

if ($('.bottom-fixed-promo-banner').length) {
    $('.bottom-fixed-promo-banner .close-banner').click(function() {
        $('footer').removeClass('extra-bottom-padding');
        $('.bottom-fixed-promo-banner').remove();

        var now = new Date();
        var time = now.getTime();
        time += 7200 * 1000;
        now.setTime(time);
        document.cookie = 'hide-holiday-calendar-banner=1; expires=' + now.toUTCString() + ';domain=dentacoin.com;path=/;';
    });
}