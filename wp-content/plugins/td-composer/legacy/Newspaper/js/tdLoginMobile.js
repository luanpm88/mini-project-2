jQuery().ready(function(){jQuery("#login-link-mob").on("click",function(){tdLoginMob.showHideElements([["#td-login-mob",1],["#td-register-mob",0],["#td-forgot-pass-mob",0]]);jQuery("#td-mobile-nav").addClass("td-hide-menu-content");700<jQuery(window).width()&&!1===tdDetect.isIe&&jQuery("#login_email-mob").focus();tdLoginMob.showHideMsg()});jQuery("#register-link-mob, #signin-register-link-mob").on("click",function(){tdLoginMob.showHideElements([["#td-login-mob",0],["#td-register-mob",1],["#td-forgot-pass-mob",
0]]);jQuery("#td-mobile-nav").addClass("td-hide-menu-content");700<jQuery(window).width()&&!1===tdDetect.isIe&&jQuery("#register_email-mob").focus();tdLoginMob.showHideMsg()});jQuery("#forgot-pass-link-mob").on("click",function(){tdLoginMob.showHideElements([["#td-login-mob",0],["#td-register-mob",0],["#td-forgot-pass-mob",1]]);700<jQuery(window).width()&&!1===tdDetect.isIe&&jQuery("#forgot_email-mob").focus();tdLoginMob.showHideMsg()});jQuery("#login_button-mob").on("click",function(){tdLoginMob.handlerLogin()});
jQuery("#login_pass-mob").keydown(function(a){(a.which&&13===a.which||a.keyCode&&13===a.keyCode)&&tdLoginMob.handlerLogin()});jQuery("#register_button-mob").on("click",function(){tdLoginMob.handlerRegister()});jQuery("#register_user-mob").keydown(function(a){(a.which&&13===a.which||a.keyCode&&13===a.keyCode)&&tdLoginMob.handlerRegister()});jQuery("#forgot_button-mob").on("click",function(){tdLoginMob.handlerForgotPass()});jQuery("#forgot_email-mob").keydown(function(a){(a.which&&13===a.which||a.keyCode&&
13===a.keyCode)&&tdLoginMob.handlerForgotPass()});jQuery("#td-mobile-nav .td-login-close span, #td-mobile-nav .td-register-close span").on("click",function(){tdLoginMob.showHideElements([["#td-login-mob",0],["#td-register-mob",0],["#td-forgot-pass-mob",0]]);jQuery("#td-mobile-nav").removeClass("td-hide-menu-content")});jQuery("#td-mobile-nav .td-forgot-pass-close a").on("click",function(){tdLoginMob.showHideElements([["#td-login-mob",1],["#td-register-mob",0],["#td-forgot-pass-mob",0]])});jQuery(".td-login-fb-mob").on("click",
function(a){a.preventDefault();a=jQuery(this);tdLoginMob.doFBLoginAction(a)})});var tdLoginMob={};
(function(){tdLoginMob={email_pattern:/^[a-zA-Z0-9][a-zA-Z0-9_\.-]{0,}[a-zA-Z0-9]@[a-zA-Z0-9][a-zA-Z0-9_\.-]{0,}[a-z0-9][\.][a-z0-9]{2,4}$/,handlerLogin:function(){var a=jQuery("#login_email-mob"),b=jQuery("#login_pass-mob"),c=jQuery("#gRecaptchaResponseMobL");if(a.length&&b.length){var d=a.val().trim(),e=b.val().trim(),g=c.attr("data-sitekey"),f="";d&&e?(tdLoginMob.addRemoveClass([".td_display_err",1,"td_display_msg_ok"]),tdLoginMob.showHideMsg(td_please_wait),c.length?grecaptcha.ready(function(){grecaptcha.execute(g,
{action:"submit"}).then(function(a){f=a;tdLoginMob.doAction("td_mod_login",d,"",e,f)})}):tdLoginMob.doAction("td_mod_login",d,"",e)):tdLoginMob.showHideMsg(td_email_user_pass_incorrect)}},handlerRegister:function(){var a=jQuery("#register_email-mob"),b=jQuery("#register_user-mob"),c=jQuery("#gRecaptchaResponseMobR");if(a.length&&b.length){var d=a.val().trim(),e=b.val().trim(),g=c.attr("data-sitekey"),f="";tdLoginMob.email_pattern.test(d)&&e?(tdLoginMob.addRemoveClass([".td_display_err",1,"td_display_msg_ok"]),
tdLoginMob.showHideMsg(td_please_wait),c.length?grecaptcha.ready(function(){grecaptcha.execute(g,{action:"submit"}).then(function(a){f=a;tdLoginMob.doAction("td_mod_register",d,e,"",f)})}):tdLoginMob.doAction("td_mod_register",d,e,"")):tdLoginMob.showHideMsg(td_email_user_incorrect)}},handlerForgotPass:function(){var a=jQuery("#forgot_email-mob");a.length&&(a=a.val().trim(),tdLoginMob.email_pattern.test(a)?(tdLoginMob.addRemoveClass([".td_display_err",1,"td_display_msg_ok"]),tdLoginMob.showHideMsg(td_please_wait),
tdLoginMob.doAction("td_mod_remember_pass",a,"","")):tdLoginMob.showHideMsg(td_email_incorrect))},showHideElements:function(a){if(a.constructor===Array)for(var b=a.length,c=0;c<b;c++)if(a[c].constructor===Array&&2===a[c].length){var d=jQuery(a[c][0]);d.length&&(1===a[c][1]?d.removeClass("td-login-hide").addClass("td-login-show"):d.removeClass("td-login-show").addClass("td-login-hide"))}},addRemoveClass:function(a){if(a.constructor===Array&&3===a.length){var b=jQuery(a[0]);b.length&&(1===a[1]?b.addClass(a[2]):
b.removeClass(a[2]))}},showHideMsg:function(a){var b=jQuery(".td_display_err");b.length&&(void 0!==a&&a.constructor===String&&0<a.length?(b.show(),b.html(a)):(b.hide(),b.html("")))},clearFields:function(){jQuery("#login_email-mob").val("");jQuery("#login_pass-mob").val("");jQuery("#register_email-mob").val("");jQuery("#register_user-mob").val("");jQuery("#forgot_email-mob").val("")},doAction:function(a,b,c,d,e){jQuery.ajax({type:"POST",url:td_ajax_url,data:{action:a,email:b,user:c,pass:d,captcha:e},
success:function(a,b,c){a=jQuery.parseJSON(a);switch(a[0]){case "login":1===a[1]?location.reload(!0):(tdLoginMob.addRemoveClass([".td_display_err",0,"td_display_msg_ok"]),tdLoginMob.showHideMsg(a[2]));break;case "register":1===a[1]?tdLoginMob.addRemoveClass([".td_display_err",1,"td_display_msg_ok"]):tdLoginMob.addRemoveClass([".td_display_err",0,"td_display_msg_ok"]);tdLoginMob.showHideMsg(a[2]);break;case "remember_pass":1===a[1]?tdLoginMob.addRemoveClass([".td_display_err",1,"td_display_msg_ok"]):
tdLoginMob.addRemoveClass([".td_display_err",0,"td_display_msg_ok"]),tdLoginMob.showHideMsg(a[2])}},error:function(a,b,c){}})},doFBLoginAction:function(a){var b=a.closest("#login-form-mobile");b.find(".td_display_err").hide();b.addClass("td-login-form-mobile-fb-open");FB.login(function(a){"connected"===a.status?FB.api("/me?fields=id,name,first_name,last_name,email,picture.type(large),locale",function(a){jQuery.ajax({type:"POST",url:td_ajax_url,data:{action:"td_ajax_fb_login_user",user:a},success:function(a){a=
jQuery.parseJSON(a);""!==a.error?(b.removeClass("td-login-form-mobile-fb-open"),tdLoginMob.addRemoveClass([".td_display_err",0,"td_display_msg_ok"]),tdLoginMob.showHideMsg(a.error)):(""!==a.success&&(tdLoginMob.addRemoveClass([".td_display_err",1,"td_display_msg_ok"]),tdLoginMob.showHideMsg(a.success)),location.reload(!0))}})}):(b.removeClass("td-login-form-mobile-fb-open"),tdLoginMob.addRemoveClass([".td_display_err",0,"td_display_msg_ok"]),tdLoginMob.showHideMsg("An unexpected error has occured. Please try again!"))},
{scope:"public_profile, email"})}}})();
