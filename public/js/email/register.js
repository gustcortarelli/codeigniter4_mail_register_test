var onloadCallback;

$(function() { 

    var _lang, _key;

    var init = function() {
        $.get("api/emails/data", function(ret){
            _lang = ret.resources;
            _key = ret.data.captcha_public_key;
        }).done(function(){
            loadScripts("https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit");
        });
    };

    onloadCallback = function() {
        grecaptcha.render('g-recaptcha-div', {
            'sitekey' : _key,
            'callback' : function(response) {
                resetAlert();
            },
        });
    };

    var resetAlert = function() {
        $("#alert-message").addClass("d-none");
        $("#alert-message>span").html("");
    };

    var showAlert = function(message) {
        $("#alert-message>span").html(getReturnedMessage(message));
        $("#alert-message").removeClass("d-none");
    };

    var startLoading = function() {
        $("#btn-submit-form").attr("disabled", true);
        $("#btn-submit-label").addClass("d-none");
        $("#submit-loading").removeClass("d-none");
    };

    var stopLoading = function() {
        $("#btn-submit-form").attr("disabled", false);
        $("#btn-submit-label").removeClass("d-none");
        $("#submit-loading").addClass("d-none");
    };
    
    $("#form-register").on("submit", function(){
        if (!$('#g-recaptcha-response') || $('#g-recaptcha-response').val() == '') {
            showAlert(_lang["captcha_is_required"]);
            return;
        }

        startLoading();

        $.ajax({
            url: "api/emails",
            data: $("#form-register").serialize(),
            type: 'POST',
            complete: function(xhr) {
                if (xhr.readyState == 4) {
                    if (xhr.status == 201) {
                        console.log(xhr);
                        document.location = "success";
                        return;
                    } else {
                        showAlert(xhr.responseJSON.messages);
                        grecaptcha.reset();
                    }
                } else {
                    showAlert(_lang["request_error"]);
                }
                stopLoading();
            }
        });
    });

    init();
});