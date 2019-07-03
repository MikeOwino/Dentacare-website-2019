import _regeneratorRuntime from "babel-runtime/regenerator";

//return from CoreDB if email is taken
var checkIfFreeEmail = function () {
    var _ref5 = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime.mark(function _callee5(email) {
        return _regeneratorRuntime.wrap(function _callee5$(_context5) {
            while (1) {
                switch (_context5.prev = _context5.next) {
                    case 0:
                        _context5.next = 2;
                        return $.ajax({
                            type: 'POST',
                            url: '/check-email',
                            dataType: 'json',
                            data: {
                                email: email
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                    case 2:
                        return _context5.abrupt("return", _context5.sent);

                    case 3:
                    case "end":
                        return _context5.stop();
                }
            }
        }, _callee5, this);
    }));

    return function checkIfFreeEmail(_x4) {
        return _ref5.apply(this, arguments);
    };
}();

var checkCaptcha = function () {
    var _ref6 = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime.mark(function _callee6(captcha) {
        return _regeneratorRuntime.wrap(function _callee6$(_context6) {
            while (1) {
                switch (_context6.prev = _context6.next) {
                    case 0:
                        _context6.next = 2;
                        return $.ajax({
                            type: 'POST',
                            url: '/check-captcha',
                            dataType: 'json',
                            data: {
                                captcha: captcha
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                    case 2:
                        return _context6.abrupt("return", _context6.sent);

                    case 3:
                    case "end":
                        return _context6.stop();
                }
            }
        }, _callee6, this);
    }));

    return function checkCaptcha(_x5) {
        return _ref6.apply(this, arguments);
    };
}();

var validatePhone = function () {
    var _ref7 = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime.mark(function _callee7(phone, country_code) {
        return _regeneratorRuntime.wrap(function _callee7$(_context7) {
            while (1) {
                switch (_context7.prev = _context7.next) {
                    case 0:
                        _context7.next = 2;
                        return $.ajax({
                            type: 'POST',
                            url: 'https://api.dentacoin.com/api/phone/',
                            dataType: 'json',
                            data: {
                                phone: phone,
                                country_code: country_code
                            }
                        });

                    case 2:
                        return _context7.abrupt("return", _context7.sent);

                    case 3:
                    case "end":
                        return _context7.stop();
                }
            }
        }, _callee7, this);
    }));

    return function validatePhone(_x6, _x7) {
        return _ref7.apply(this, arguments);
    };
}();

function _asyncToGenerator(fn) { return function () { var gen = fn.apply(this, arguments); return new Promise(function (resolve, reject) { function step(key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { return Promise.resolve(value).then(function (value) { step("next", value); }, function (err) { step("throw", err); }); } } return step("next"); }); }; }

var basic = {
    options: {
        alert: null
    },
    init: function init(opt) {
        basic.addCsrfTokenToAllAjax();
        //basic.stopMaliciousInspect();
    },
    cookies: {
        set: function set(name, value) {
            if (name == undefined) {
                name = "cookieLaw";
            }
            if (value == undefined) {
                value = 1;
            }
            var d = new Date();
            d.setTime(d.getTime() + 10 * 24 * 60 * 60 * 1000);
            var expires = "expires=" + d.toUTCString();
            document.cookie = name + "=" + value + "; " + expires + ";path=/";
            if (name == "cookieLaw") {
                $(".cookies_popup").slideUp();
            }
        },
        erase: function erase(name) {
            document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        },
        get: function get(name) {
            if (name == undefined) {
                var name = "cookieLaw";
            }
            name = name + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
            }
            return "";
        }
    },
    fixPlaceholders: function fixPlaceholders() {
        $("input[data-placeholder]").each(function () {
            if ($(this).data("placeholders-fixed") == undefined) {
                $(this).data("placeholders-fixed", true);

                basic.setInputsPlaceholder($(this));

                $focus_function = "if($(this).val()=='" + $(this).data("placeholder") + "'){ $(this).val(''); }";
                if ($(this).attr("onkeydown") != undefined) {
                    $focus_function = $(this).attr("onkeydown") + "; " + $focus_function;
                }
                $(this).attr("onkeydown", $focus_function);

                $blur_function = "if($(this).val()==''){ $(this).val('" + $(this).data("placeholder") + "'); }";
                if ($(this).attr("onblur") != undefined) {
                    $blur_function = $(this).attr("onblur") + "; " + $blur_function;
                }
                $(this).attr("onblur", $blur_function);
            }
        });
    },
    clearPlaceholders: function clearPlaceholders(extra_filter) {
        if (extra_filter == undefined) {
            extra_filter = "";
        }
        $("input[data-placeholder]" + extra_filter).each(function () {
            if ($(this).val() == $(this).data("placeholder")) {
                $(this).val('');
            }
        });
    },
    setPlaceholders: function setPlaceholders() {
        $("input[data-placeholder]").each(function () {
            basic.setInputsPlaceholder($(this));
        });
    },
    setInputsPlaceholder: function setInputsPlaceholder(input) {
        if ($(input).val() == "") {
            $(input).val($(input).data("placeholder"));
        }
    },
    fixBodyModal: function fixBodyModal() {
        if ($(".modal-dialog").length > 0 && !$("body").hasClass('modal-open')) {
            $("body").addClass('modal-open');
        }
    },
    fixZIndexBackdrop: function fixZIndexBackdrop() {
        if (jQuery('.bootbox').length > 1) {
            var last_z = jQuery('.bootbox').eq(jQuery('.bootbox').length - 2).css("z-index");
            jQuery('.bootbox').last().css({ 'z-index': last_z + 2 }).next('.modal-backdrop').css({ 'z-index': last_z + 1 });
        }
    },
    showAlert: function showAlert(message, class_name, vertical_center) {
        basic.realShowDialog(message, "alert", class_name, null, null, vertical_center);
    },
    showConfirm: function showConfirm(message, class_name, params, vertical_center) {
        basic.realShowDialog(message, "confirm", class_name, params, null, vertical_center);
    },
    showDialog: function showDialog(message, class_name, type, vertical_center) {
        if (type === undefined) {
            type = null;
        }
        basic.realShowDialog(message, "dialog", class_name, null, type, vertical_center);
    },
    realShowDialog: function realShowDialog(message, dialog_type, class_name, params, type, vertical_center) {
        if (class_name === undefined) {
            class_name = "";
        }
        if (type === undefined) {
            type = null;
        }
        if (vertical_center === undefined) {
            vertical_center = null;
        }

        var atrs = {
            "message": message,
            "animate": false,
            "show": false,
            "className": class_name
        };

        if (dialog_type == "confirm" && params != undefined && params.buttons == undefined) {
            atrs.buttons = {
                confirm: {
                    label: 'Yes',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger'
                }
            };
        }
        if (params != undefined) {
            for (var key in params) {
                atrs[key] = params[key];
            }
        }

        var dialog = eval("bootbox." + dialog_type)(atrs);
        dialog.on('hidden.bs.modal', function () {
            basic.fixBodyModal();
            if (type != null) {
                $('.single-application figure[data-slug="' + type + '"]').parent().focus();
            }
        });
        dialog.on('shown.bs.modal', function () {
            if (vertical_center != null) {
                basic.verticalAlignModal();
            }
            basic.fixZIndexBackdrop();
        });
        dialog.modal('show');
    },
    verticalAlignModal: function verticalAlignModal(message) {
        $("body .modal-dialog").each(function () {
            $(this).css("margin-top", Math.max(20, ($(window).height() - $(this).height()) / 2));
        });
    },
    closeDialog: function closeDialog() {
        bootbox.hideAll();
    },
    request: {
        initialize: false,
        result: null,
        submit: function submit(url, data, options, callback, curtain) {
            options = $.extend({
                type: 'POST',
                dataType: 'json',
                async: true
            }, options);
            if (basic.request.initialize && options.async == false) {
                console.log(['Please wait for parent request']);
            } else {
                basic.request.initialize = true;
                return $.ajax({
                    url: url,
                    data: data,
                    type: options.type,
                    dataType: options.dataType,
                    async: options.async,
                    beforeSend: function beforeSend() {
                        if (curtain !== null) {
                            basic.addCurtain();
                        }
                    },
                    success: function success(response) {
                        basic.request.result = response;
                        if (curtain !== null) {
                            basic.removeCurtain();
                        }
                        basic.request.initialize = false;
                        if (typeof callback === 'function') {
                            callback(response);
                        }
                    },
                    error: function error() {
                        basic.request.initialize = false;
                    }
                });
            }
        },
        validate: function validate(form, callback, data) {
            //if data is passed skip clearing all placeholders and removing messages. it's done inside the calling function
            if (data == undefined) {
                basic.clearPlaceholders();
                $(".input-error-message").remove();
                data = form.serialize();
            }
            return basic.request.submit(SITE_URL + "validate/", data, { async: false }, function (res) {
                if (typeof callback === 'function') {
                    callback();
                }
            }, null);
        },
        markValidationErrors: function markValidationErrors(validation_result, form) {
            basic.setPlaceholders();
            if (typeof validation_result.all_errors == "undefined") {
                if (typeof validation_result.message != "undefined") {
                    basic.showAlert(validation_result.message);
                    return true;
                }
            } else {
                var all_errors = JSON.parse(validation_result.all_errors);
                for (var param_name in all_errors) {
                    //if there is error, but no name for it, pop it in alert
                    if (Object.keys(all_errors).length == 1 && $('[name="' + param_name + '"]').length == 0) {
                        basic.showAlert(all_errors[param_name]);
                        return false;
                    }

                    if (form == undefined) {
                        var input = $('[name="' + param_name + '"]');
                    } else {
                        var input = form.find('[name="' + param_name + '"]');
                    }
                    basic.request.removeValidationErrors(input);
                    if (input.closest('.input-error-message-holder')) {
                        input.closest('.input-error-message-holder').append('<div class="input-error-message">' + all_errors[param_name] + '</div>');
                    } else {
                        input.after('<div class="input-error-message">' + all_errors[param_name] + '</div>');
                    }
                    //basic.setInputsPlaceholder(input);
                }
            }
        },
        removeValidationErrors: function removeValidationErrors(input) {
            input.closest('.input-error-message-holder').find(".input-error-message").remove();
            input.parent().remove(".input-error-message");
        }
    },
    alert: function alert(message) {
        basic.options.alert(message);
    },
    addCurtain: function addCurtain() {
        $("body").prepend('<div class="curtain"></div>');
    },
    removeCurtain: function removeCurtain() {
        $("body .curtain").remove();
    },
    validateEmail: function validateEmail(email) {
        return (/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email)
        );
    },
    isInViewport: function isInViewport(el) {
        var elementTop = $(el).offset().top;
        var elementBottom = elementTop + $(el).outerHeight();
        var viewportTop = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height();
        return elementBottom > viewportTop && elementTop < viewportBottom;
    },
    isMobile: function isMobile() {
        var isMobile = false; //initiate as false
        // device detection
        if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0, 4))) {
            isMobile = true;
        }
        return isMobile;
    },
    addCsrfTokenToAllAjax: function addCsrfTokenToAllAjax() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    },
    stopMaliciousInspect: function stopMaliciousInspect() {
        document.addEventListener('contextmenu', function (e) {
            e.preventDefault();
        });

        document.onkeydown = function (e) {
            if (event.keyCode == 123) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
                return false;
            }
        };
    }
};
basic.init();
$(document).ready(function () {});

$(window).on('load', function () {});

$(window).on("load", function () {});

$(window).on('resize', function () {});

$(window).on('scroll', function () {});

function generateUrl(str) {
    var str_arr = str.split("");
    var cyr = ['Ð°', 'Ð±', 'Ð²', 'Ð³', 'Ð´', 'Ðµ', 'Ñ‘', 'Ð¶', 'Ð·', 'Ð¸', 'Ð¹', 'Ðº', 'Ð»', 'Ð¼', 'Ð½', 'Ð¾', 'Ð¿', 'Ñ€', 'Ñ', 'Ñ‚', 'Ñƒ', 'Ñ„', 'Ñ…', 'Ñ†', 'Ñ‡', 'Ñˆ', 'Ñ‰', 'ÑŠ', 'Ñ‹', 'ÑŒ', 'Ñ', 'ÑŽ', 'Ñ', 'Ð', 'Ð‘', 'Ð’', 'Ð“', 'Ð”', 'Ð•', 'Ð', 'Ð–', 'Ð—', 'Ð˜', 'Ð™', 'Ðš', 'Ð›', 'Ðœ', 'Ð', 'Ðž', 'ÐŸ', 'Ð ', 'Ð¡', 'Ð¢', 'Ð£', 'Ð¤', 'Ð¥', 'Ð¦', 'Ð§', 'Ð¨', 'Ð©', 'Ðª', 'Ð«', 'Ð¬', 'Ð­', 'Ð®', 'Ð¯', ' '];
    var lat = ['a', 'b', 'v', 'g', 'd', 'e', 'io', 'zh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'ts', 'ch', 'sh', 'sht', 'a', 'i', 'y', 'e', 'yu', 'ya', 'A', 'B', 'V', 'G', 'D', 'E', 'Io', 'Zh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'Ts', 'Ch', 'Sh', 'Sht', 'A', 'I', 'Y', 'e', 'Yu', 'Ya', '-'];
    for (var i = 0; i < str_arr.length; i += 1) {
        for (var y = 0; y < cyr.length; y += 1) {
            if (str_arr[i] == cyr[y]) {
                str_arr[i] = lat[y];
            }
        }
    }
    return str_arr.join("").toLowerCase();
}

function checkIfCookie() {
    if ($('.privacy-policy-cookie').length > 0) {
        $('.privacy-policy-cookie .accept').click(function () {
            basic.cookies.set('privacy_policy', 1);
            $('.privacy-policy-cookie').hide();
        });
    }
}

function initCaptchaRefreshEvent() {
    //refreshing captcha on trying to log in admin
    if ($('.refresh-captcha').length > 0) {
        $('.refresh-captcha').click(function () {
            $.ajax({
                type: 'GET',
                url: '/refresh-captcha',
                dataType: 'json',
                success: function success(response) {
                    $('.captcha-container span').html(response.captcha);
                }
            });
        });
    }
}
initCaptchaRefreshEvent();

//PAGES DATA
if ($('body').hasClass('home')) {
    if ($('.moving-phones-container').length) {
        setTimeout(function () {
            $('.moving-phones-container').animate({
                'left': '0'
            }, 1500, null, function () {
                $('.first-phone').addClass('right-rotation');
                $('.second-phone').addClass('right-rotation');
                $('.third-phone').addClass('left-rotation');

                $('.moving-phones-container').addClass('move-back-top');
            });
        }, 1000);
    }

    if ($('.testimonials-slider').length > 0) {
        $('.testimonials-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 8000,
            adaptiveHeight: true
        });
    }
}

//on button click next time when you hover the button the color is bugged until you click some other element (until you move out the focus from this button)
function fixButtonsFocus() {
    $(document).on('click', '.light-blue-white-btn', function () {
        $(this).blur();
    });
    $(document).on('click', '.white-light-blue-btn', function () {
        $(this).blur();
    });
}
fixButtonsFocus();

function hidePopupOnBackdropClick() {
    $(document).on('click', '.bootbox', function () {
        var classname = event.target.className;
        classname = classname.replace(/ /g, '.');

        if (classname && !$('.' + classname).parents('.modal-dialog').length) {
            if ($('.bootbox.login-signin-popup').length) {
                $('.hidden-login-form').html(hidden_popup_content);
            }
            if ($('.bootbox.login-signin-popup').length) {
                $('.hidden-login-form').html(hidden_popup_content);
            }
            bootbox.hideAll();
        }
    });
}
hidePopupOnBackdropClick();

var hidden_popup_content = $('.hidden-login-form').html();
//call the popup for login/sign for patient and dentist
function bindLoginSigninPopupShow() {
    $(document).on('click', '.show-login-signin', function () {
        openLoginSigninPopup();
    });
}
bindLoginSigninPopupShow();

function openLoginSigninPopup() {
    basic.closeDialog();
    $('.hidden-login-form').html('');
    basic.showDialog(hidden_popup_content, 'login-signin-popup', null, true);

    $('.login-signin-popup .dentist .form-register .address-suggester').removeClass('dont-init');

    initAddressSuggesters();

    $('.login-signin-popup .popup-header-action a').click(function () {
        $('.login-signin-popup .popup-body > .inline-block').addClass('custom-hide');
        $('.login-signin-popup .popup-body .' + $(this).attr('data-type')).removeClass('custom-hide');
    });

    $('.login-signin-popup .call-sign-up').click(function () {
        $('.login-signin-popup .form-login').hide();
        $('.login-signin-popup .form-register').show();
    });

    $('.login-signin-popup .call-log-in').click(function () {
        $('.login-signin-popup .form-login').show();
        $('.login-signin-popup .form-register').hide();
    });

    // ====================== PATIENT LOGIN/SIGNUP LOGIC ======================

    //login
    $('.login-signin-popup .patient .form-register #privacy-policy-registration-patient').on('change', function () {
        if ($(this).is(':checked')) {
            $('.login-signin-popup .patient .form-register .facebook-custom-btn').removeAttr('custom-stopper');
            $('.login-signin-popup .patient .form-register .civic-custom-btn').removeAttr('custom-stopper');
        } else {
            $('.login-signin-popup .patient .form-register .facebook-custom-btn').attr('custom-stopper', 'true');
            $('.login-signin-popup .patient .form-register .civic-custom-btn').attr('custom-stopper', 'true');
        }
    });

    $(document).on('civicCustomBtnClicked', function (event) {
        $('.login-signin-popup .patient .form-register .step-errors-holder').html('');
    });

    $(document).on('civicRead', function () {
        var _ref = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime.mark(function _callee(event) {
            return _regeneratorRuntime.wrap(function _callee$(_context) {
                while (1) {
                    switch (_context.prev = _context.next) {
                        case 0:
                            $('.response-layer').show();

                        case 1:
                        case "end":
                            return _context.stop();
                    }
                }
            }, _callee, this);
        }));

        return function (_x) {
            return _ref.apply(this, arguments);
        };
    }());

    $(document).on('receivedFacebookToken', function () {
        var _ref2 = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime.mark(function _callee2(event) {
            return _regeneratorRuntime.wrap(function _callee2$(_context2) {
                while (1) {
                    switch (_context2.prev = _context2.next) {
                        case 0:
                            $('.response-layer').show();

                        case 1:
                        case "end":
                            return _context2.stop();
                    }
                }
            }, _callee2, this);
        }));

        return function (_x2) {
            return _ref2.apply(this, arguments);
        };
    }());

    $(document).on('facebookCustomBtnClicked', function (event) {
        $('.login-signin-popup .patient .form-register .step-errors-holder').html('');
    });

    $(document).on('customCivicFbStopperTriggered', function (event) {
        customErrorHandle($('.login-signin-popup .patient .form-register .step-errors-holder'), 'Please agree with our privacy policy.');
    });
    // ====================== /PATIENT LOGIN/SIGNUP LOGIC ======================

    // ====================== DENTIST LOGIN/SIGNUP LOGIC ======================
    //DENTIST LOGIN
    $('.login-signin-popup form#dentist-login').on('submit', function () {
        var _ref3 = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime.mark(function _callee3(event) {
            var this_form_native, this_form, form_fields, submit_form, i, len;
            return _regeneratorRuntime.wrap(function _callee3$(_context3) {
                while (1) {
                    switch (_context3.prev = _context3.next) {
                        case 0:
                            this_form_native = this;
                            this_form = $(this_form_native);

                            event.preventDefault();
                            //clear prev errors
                            if ($('.login-signin-popup form#dentist-login .error-handle').length) {
                                $('.login-signin-popup form#dentist-login .error-handle').remove();
                            }

                            form_fields = this_form.find('.form-field');
                            submit_form = true;

                            for (i = 0, len = form_fields.length; i < len; i += 1) {
                                if (form_fields.eq(i).attr('type') == 'email' && !basic.validateEmail(form_fields.eq(i).val().trim())) {
                                    customErrorHandle(form_fields.eq(i).closest('.field-parent'), 'Please use valid email address.');
                                    submit_form = false;
                                } else if (form_fields.eq(i).attr('type') == 'password' && form_fields.eq(i).val().length < 6) {
                                    customErrorHandle(form_fields.eq(i).closest('.field-parent'), 'Passwords must be min length 6.');
                                    submit_form = false;
                                }

                                if (form_fields.eq(i).val().trim() == '') {
                                    customErrorHandle(form_fields.eq(i).closest('.field-parent'), 'This field is required.');
                                    submit_form = false;
                                }
                            }

                            if (submit_form) {
                                if (check_account_response.success) {
                                    fireGoogleAnalyticsEvent('DentistLogin', 'Click', 'Dentist Login');
                                    this_form_native.submit();
                                } else if (check_account_response.error) {
                                    customErrorHandle(this_form.find('input[name="password"]').closest('.field-parent'), check_account_response.message);
                                }
                            }

                        case 8:
                        case "end":
                            return _context3.stop();
                    }
                }
            }, _callee3, this);
        }));

        return function (_x3) {
            return _ref3.apply(this, arguments);
        };
    }());

    //DENTIST REGISTER
    $('.login-signin-popup .dentist .form-register .prev-step').click(function () {
        var current_step = $('.login-signin-popup .dentist .form-register .step.visible');
        var current_prev_step = current_step.prev();
        current_step.removeClass('visible');
        if (current_prev_step.hasClass('first')) {
            $(this).hide();
        }
        current_prev_step.addClass('visible');

        $('.login-signin-popup .dentist .form-register .next-step').val('Next');
        $('.login-signin-popup .dentist .form-register .next-step').attr('data-current-step', current_prev_step.attr('data-step'));
    });

    //SECOND STEP INIT LOGIC
    $('.login-signin-popup .step.second .user-type-container .user-type').click(function () {
        $('.login-signin-popup .step.second .user-type-container .user-type').removeClass('active');
        $(this).addClass('active');
        $('.login-signin-popup .step.second .user-type-container [name="user-type"]').val($(this).attr('data-type'));
    });

    //THIRD STEP INIT LOGIC
    $('.login-signin-popup #dentist-country').on('change', function () {
        $('.login-signin-popup .step.third .phone .country-code').html('+' + $(this).find('option:selected').attr('data-code'));
    });

    //FOURTH STEP INIT LOGIC
    styleAvatarUploadButton('.bootbox.login-signin-popup .dentist .form-register .step.fourth .avatar .btn-wrapper label');
    initCaptchaRefreshEvent();

    //DENTIST REGISTERING FORM
    $('.login-signin-popup .dentist .form-register .next-step').click(_asyncToGenerator( /*#__PURE__*/_regeneratorRuntime.mark(function _callee4() {
        var this_btn, first_step_inputs, errors, i, len, check_email_if_free_response, second_step_inputs, third_step_inputs, validate_phone, check_captcha_response;
        return _regeneratorRuntime.wrap(function _callee4$(_context4) {
            while (1) {
                switch (_context4.prev = _context4.next) {
                    case 0:
                        this_btn = $(this);
                        _context4.t0 = this_btn.attr('data-current-step');
                        _context4.next = _context4.t0 === 'first' ? 4 : _context4.t0 === 'second' ? 27 : _context4.t0 === 'third' ? 35 : _context4.t0 === 'fourth' ? 45 : 60;
                        break;

                    case 4:
                        first_step_inputs = $('.login-signin-popup .dentist .form-register .step.first .form-field');
                        errors = false;

                        $('.login-signin-popup .dentist .form-register .step.first').parent().find('.error-handle').remove();
                        i = 0, len = first_step_inputs.length;

                    case 8:
                        if (!(i < len)) {
                            _context4.next = 24;
                            break;
                        }

                        if (!(first_step_inputs.eq(i).attr('type') == 'email' && !basic.validateEmail(first_step_inputs.eq(i).val().trim()))) {
                            _context4.next = 14;
                            break;
                        }

                        customErrorHandle(first_step_inputs.eq(i).closest('.field-parent'), 'Please use valid email address.');
                        errors = true;
                        _context4.next = 19;
                        break;

                    case 14:
                        if (!(first_step_inputs.eq(i).attr('type') == 'email' && basic.validateEmail(first_step_inputs.eq(i).val().trim()))) {
                            _context4.next = 19;
                            break;
                        }

                        _context4.next = 17;
                        return checkIfFreeEmail(first_step_inputs.eq(i).val().trim());

                    case 17:
                        check_email_if_free_response = _context4.sent;

                        if (check_email_if_free_response.error) {
                            customErrorHandle(first_step_inputs.eq(i).closest('.field-parent'), 'The email has already been taken.');
                            errors = true;
                        }

                    case 19:

                        if (first_step_inputs.eq(i).attr('type') == 'password' && first_step_inputs.eq(i).val().length < 6) {
                            customErrorHandle(first_step_inputs.eq(i).closest('.field-parent'), 'Passwords must be min length 6.');
                            errors = true;
                        }

                        if (first_step_inputs.eq(i).val().trim() == '') {
                            customErrorHandle(first_step_inputs.eq(i).closest('.field-parent'), 'This field is required.');
                            errors = true;
                        }

                    case 21:
                        i += 1;
                        _context4.next = 8;
                        break;

                    case 24:

                        if ($('.login-signin-popup .dentist .form-register .step.first .form-field.password').val().trim() != $('.login-signin-popup .step.first .form-field.repeat-password').val().trim()) {
                            customErrorHandle($('.login-signin-popup .step.first .form-field.repeat-password').closest('.field-parent'), 'Both passwords don\'t match.');
                            errors = true;
                        }

                        if (!errors) {
                            fireGoogleAnalyticsEvent('DentistRegistration', 'ClickNext', 'DentistRegistrationStep1');

                            $('.login-signin-popup .dentist .form-register .step').removeClass('visible');
                            $('.login-signin-popup .dentist .form-register .step.second').addClass('visible');
                            $('.login-signin-popup .prev-step').show();

                            this_btn.attr('data-current-step', 'second');
                            this_btn.val('Next');
                        }
                        return _context4.abrupt("break", 60);

                    case 27:
                        second_step_inputs = $('.login-signin-popup .dentist .form-register .step.second .form-field.required');
                        errors = false;

                        $('.login-signin-popup .dentist .form-register .step.second').find('.error-handle').remove();

                        //check form-field fields
                        for (i = 0, len = second_step_inputs.length; i < len; i += 1) {
                            if (second_step_inputs.eq(i).is('select')) {
                                //IF SELECT TAG
                                if (second_step_inputs.eq(i).val().trim() == '') {
                                    customErrorHandle(second_step_inputs.eq(i).closest('.field-parent'), 'This field is required.');
                                    errors = true;
                                }
                            } else if (second_step_inputs.eq(i).is('input')) {
                                //IF INPUT TAG
                                if (second_step_inputs.eq(i).val().trim() == '') {
                                    customErrorHandle(second_step_inputs.eq(i).closest('.field-parent'), 'This field is required.');
                                    errors = true;
                                }
                            }
                        }

                        //check if latin name accepts only LATIN characters
                        if (!/^[a-z A-Z]+$/.test($('.login-signin-popup .dentist .form-register .step.second input[name="latin-name"]').val().trim())) {

                            customErrorHandle($('.login-signin-popup .dentist .form-register .step.second input[name="latin-name"]').closest('.field-parent'), 'This field should contain only latin characters.');
                            errors = true;
                        }

                        //check if privacy policy checkbox is checked
                        if (!$('.login-signin-popup .dentist .form-register .step.second #privacy-policy-registration').is(':checked')) {
                            customErrorHandle($('.login-signin-popup .dentist .form-register .step.second .privacy-policy-row'), 'Please agree with our <a href="//dentacoin.com/privacy-policy" target="_blank">Privacy policy</a>.');
                            errors = true;
                        }

                        if (!errors) {
                            fireGoogleAnalyticsEvent('DentistRegistration', 'ClickNext', 'DentistRegistrationStep2');

                            $('.login-signin-popup .dentist .form-register .step').removeClass('visible');
                            $('.login-signin-popup .dentist .form-register .step.third').addClass('visible');

                            this_btn.attr('data-current-step', 'third');
                            this_btn.val('Next');
                        }
                        return _context4.abrupt("break", 60);

                    case 35:
                        third_step_inputs = $('.login-signin-popup .dentist .form-register .step.third .form-field.required');
                        errors = false;

                        $('.login-signin-popup .dentist .form-register .step.third').find('.error-handle').remove();

                        for (i = 0, len = third_step_inputs.length; i < len; i += 1) {
                            if (third_step_inputs.eq(i).is('select')) {
                                //IF SELECT TAG
                                if (third_step_inputs.eq(i).val().trim() == '') {
                                    customErrorHandle(third_step_inputs.eq(i).closest('.field-parent'), 'This field is required.');
                                    errors = true;
                                }
                            } else if (third_step_inputs.eq(i).is('input')) {
                                //IF INPUT TAG
                                if (third_step_inputs.eq(i).val().trim() == '') {
                                    customErrorHandle(third_step_inputs.eq(i).closest('.field-parent'), 'This field is required.');
                                    errors = true;
                                }
                                if (third_step_inputs.eq(i).attr('type') == 'url' && !basic.validateUrl(third_step_inputs.eq(i).val().trim())) {
                                    customErrorHandle(third_step_inputs.eq(i).closest('.field-parent'), 'Please enter your website URL starting with http:// or https://.');
                                    errors = true;
                                } else if (third_step_inputs.eq(i).attr('type') == 'number' && !basic.validatePhone(third_step_inputs.eq(i).val().trim())) {
                                    customErrorHandle(third_step_inputs.eq(i).closest('.field-parent'), 'Please use valid numbers.');
                                    errors = true;
                                }
                            }
                        }

                        _context4.next = 41;
                        return validatePhone($('.login-signin-popup .dentist .form-register .step.third input[name="phone"]').val().trim(), $('.login-signin-popup .dentist .form-register .step.third select[name="country-code"]').val());

                    case 41:
                        validate_phone = _context4.sent;

                        if (has(validate_phone, 'success') && !validate_phone.success) {
                            customErrorHandle($('.login-signin-popup .dentist .form-register .step.third input[name="phone"]').closest('.field-parent'), 'Please use valid phone.');
                            errors = true;
                        }

                        if (!errors) {
                            fireGoogleAnalyticsEvent('DentistRegistration', 'ClickNext', 'DentistRegistrationStep3');

                            $('.login-signin-popup .dentist .form-register .step').removeClass('visible');
                            $('.login-signin-popup .dentist .form-register .step.fourth').addClass('visible');

                            this_btn.attr('data-current-step', 'fourth');
                            this_btn.val('Create account');
                        }
                        return _context4.abrupt("break", 60);

                    case 45:
                        $('.login-signin-popup .dentist .form-register .step.fourth').find('.error-handle').remove();
                        errors = false;
                        //checking if empty avatar

                        if ($('.dentist .form-register .step.fourth #custom-upload-avatar').val().trim() == '') {
                            customErrorHandle($('.step.fourth .step-errors-holder'), 'Please select avatar.');
                            errors = true;
                        }

                        //checking if no specialization checkbox selected
                        if ($('.login-signin-popup .dentist .form-register .step.fourth [name="specializations[]"]:checked').val() == undefined) {
                            customErrorHandle($('.login-signin-popup .step.fourth .step-errors-holder'), 'Please select specialization/s.');
                            errors = true;
                        }

                        //check captcha

                        if (!(!$('.login-signin-popup .dentist .form-register .step.fourth .captcha-parent').length || !$('.login-signin-popup .dentist .form-register .step.fourth #register-captcha').length)) {
                            _context4.next = 54;
                            break;
                        }

                        errors = true;
                        window.location.reload();
                        _context4.next = 58;
                        break;

                    case 54:
                        _context4.next = 56;
                        return checkCaptcha($('.login-signin-popup .dentist .form-register .step.fourth #register-captcha').val().trim());

                    case 56:
                        check_captcha_response = _context4.sent;

                        if (check_captcha_response.error) {
                            customErrorHandle($('.login-signin-popup .step.fourth .step-errors-holder'), 'Please enter correct captcha.');
                            errors = true;
                        }

                    case 58:

                        if (!errors) {
                            fireGoogleAnalyticsEvent('DentistRegistration', 'ClickNext', 'DentistRegistrationComplete');

                            //submit the form
                            $('.response-layer').show();
                            $('.login-signin-popup form#dentist-register').submit();
                        }
                        return _context4.abrupt("break", 60);

                    case 60:
                    case "end":
                        return _context4.stop();
                }
            }
        }, _callee4, this);
    })));
    return false;
    // ====================== /DENTIST LOGIN/SIGNUP LOGIC ======================
}

//INIT LOGIC FOR ALL STEPS
function customErrorHandle(el, string) {
    el.append('<div class="error-handle">' + string + '</div>');
}

function styleAvatarUploadButton(label_el) {
    if (jQuery(".upload-file.avatar").length) {
        jQuery(".upload-file.avatar").each(function (key, form) {
            var this_file_btn_parent = jQuery(this);
            if (this_file_btn_parent.attr('data-current-user-avatar')) {
                this_file_btn_parent.find('.btn-wrapper').append('<label for="custom-upload-avatar" role="button" style="background-image:url(' + this_file_btn_parent.attr('data-current-user-avatar') + ');"><div class="inner"><i class="fa fa-plus fs-0" aria-hidden="true"></i><div class="inner-label fs-0">Add profile photo</div></div></label>');
            } else {
                this_file_btn_parent.find('.btn-wrapper').append('<label for="custom-upload-avatar" role="button"><div class="inner"><i class="fa fa-plus" aria-hidden="true"></i><div class="inner-label">Add profile photo</div></div></label>');
            }

            var inputs = document.querySelectorAll('.inputfile');
            Array.prototype.forEach.call(inputs, function (input) {
                var label = input.nextElementSibling,
                    labelVal = label.innerHTML;

                input.addEventListener('change', function (e) {
                    readURL(this, label_el);

                    var fileName = '';
                    if (this.files && this.files.length > 1) fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);else fileName = e.target.value.split('\\').pop();

                    /*if(fileName) {
                        if(load_filename_to_other_el)    {
                            $(this).closest('.form-row').find('.file-name').html('<i class="fa fa-file-text-o" aria-hidden="true"></i>' + fileName);
                        }else {
                            label.querySelector('span').innerHTML = fileName;
                        }
                    }else{
                        label.innerHTML = labelVal;
                    }*/
                });
                // Firefox bug fix
                input.addEventListener('focus', function () {
                    input.classList.add('has-focus');
                });
                input.addEventListener('blur', function () {
                    input.classList.remove('has-focus');
                });
            });
        });
    }
}

function readURL(input, label_el) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            //SHOW THE IMAGE ON LOAD
            $(label_el).css({ 'background-image': 'url("' + e.target.result + '")' });
            $(label_el).find('.inner i').addClass('fs-0');
            $(label_el).find('.inner .inner-label').addClass('fs-0');
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function apiEventsListeners() {
    //login
    $(document).on('successResponseCoreDBApi', function () {
        var _ref8 = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime.mark(function _callee8(event) {
            var custom_form_obj;
            return _regeneratorRuntime.wrap(function _callee8$(_context8) {
                while (1) {
                    switch (_context8.prev = _context8.next) {
                        case 0:
                            if (event.response_data.token) {
                                custom_form_obj = {
                                    token: event.response_data.token,
                                    id: event.response_data.data.id,
                                    _token: $('meta[name="csrf-token"]').attr('content')
                                };


                                if ($('input[type="hidden"][name="route"]').length && $('input[type="hidden"][name="slug"]').length) {
                                    custom_form_obj.route = $('input[type="hidden"][name="route"]').val();
                                    custom_form_obj.slug = $('input[type="hidden"][name="slug"]').val();
                                }

                                //check if CoreDB returned address for this user and if its valid one
                                if (basic.objHasKey(custom_form_obj, 'address') != null && innerAddressCheck(custom_form_obj.address)) {
                                    //var current_dentists_for_logging_user = await App.assurance_methods.getWaitingContractsForPatient(custom_form_obj.address);
                                    //if(current_dentists_for_logging_user.length > 0) {
                                    //custom_form_obj.have_contracts = true;
                                    //}
                                }

                                if (event.response_data.new_account) {
                                    //REGISTER
                                    if (event.platform_type == 'facebook') {
                                        fireGoogleAnalyticsEvent('PatientRegistration', 'ClickFB', 'Patient Registration FB');
                                    } else if (event.platform_type == 'civic') {
                                        fireGoogleAnalyticsEvent('PatientRegistration', 'ClickNext', 'Patient Registration Civic');
                                    }
                                } else {
                                    //LOGIN
                                    if (event.platform_type == 'facebook') {
                                        fireGoogleAnalyticsEvent('PatientLogin', 'Click', 'Login FB');
                                    } else if (event.platform_type == 'civic') {
                                        fireGoogleAnalyticsEvent('PatientLogin', 'Click', 'Login Civic');
                                    }
                                }

                                customJavascriptForm('/patient-login', custom_form_obj, 'post');
                            }

                        case 1:
                        case "end":
                            return _context8.stop();
                    }
                }
            }, _callee8, this);
        }));

        return function (_x8) {
            return _ref8.apply(this, arguments);
        };
    }());

    $(document).on('errorResponseCoreDBApi', function (event) {
        var error_popup_html = '';
        if (event.response_data.errors) {
            for (var key in event.response_data.errors) {
                error_popup_html += event.response_data.errors[key] + '<br>';
            }
        }

        $('.response-layer').hide();
        basic.showAlert(error_popup_html, '', true);
    });
}
apiEventsListeners();

function customJavascriptForm(path, params, method) {
    method = method || "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for (var key in params) {
        if (params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
        }
    }

    document.body.appendChild(form);
    form.submit();
}

function bindGoogleAlikeButtonsEvents() {
    //google alike style for label/placeholders
    $('body').on('click', '.custom-google-label-style label', function () {
        $(this).addClass('active-label');
        if ($('.custom-google-label-style').attr('data-input-blue-green-border') == 'true') {
            $(this).parent().find('input').addClass('blue-green-border');
        }
    });

    $('body').on('keyup change focusout', '.custom-google-label-style input', function () {
        var value = $(this).val().trim();
        if (value.length) {
            $(this).closest('.custom-google-label-style').find('label').addClass('active-label');
            if ($(this).closest('.custom-google-label-style').attr('data-input-blue-green-border') == 'true') {
                $(this).addClass('blue-green-border');
            }
        } else {
            $(this).closest('.custom-google-label-style').find('label').removeClass('active-label');
            if ($(this).closest('.custom-google-label-style').attr('data-input-blue-green-border') == 'true') {
                $(this).removeClass('blue-green-border');
            }
        }
    });
}
bindGoogleAlikeButtonsEvents();

// =================================== GOOGLE ANALYTICS TRACKING LOGIC ======================================

function fireGoogleAnalyticsEvent(category, action, label, value) {
    var event_obj = {
        'event_action': action,
        'event_category': category,
        'event_label': label
    };

    if (value != undefined) {
        event_obj.value = value;
    }

    //gtag('event', label, event_obj);
}

// =================================== /GOOGLE ANALYTICS TRACKING LOGIC ======================================