    
    <link rel="stylesheet" href="<?= base_url() . "/css/register_email.css" ?>">

    <form class="form-signin text-center" id="form-register" action="javascript: void(0);">

        <i class="fa fa-envelope-o fa-5x"></i>
        
        <h1 class="h3 mb-3 font-weight-normal mt-3"><?= lang("app.email.register_message") ?></h1>
            
        <label for="userName" class="sr-only"><?= lang("app.label.user") ?></label>
        <input type="text" id="userName" name="username" class="form-control" placeholder="<?= lang("app.label.user") ?>" required="" autofocus="">
        
        <label for="emailAddress" class="sr-only"><?= lang("app.label.email") ?></label>
        <input type="email" id="emailAddress" name="email" class="form-control" placeholder="<?= lang("app.label.email") ?>" required="">

        <div class="g-recaptcha mt-3" id="g-recaptcha-div"></div>

        <div class="alert alert-warning d-none mt-2" role="alert" id="alert-message">
            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
            <span></span>
        </div>

        <button class="btn btn-lg btn-primary btn-block mt-3" type="submit" id="btn-submit-form">
            <span id="submit-loading" class="d-none">
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <span><?= lang("app.label.loading") ?></span>
            </span>
            <span id="btn-submit-label"><?= lang("app.label.signup") ?></span>
        </button>
    </form>
    
    <script src="<?= base_url() . "/js/email/register.js" ?>"></script>