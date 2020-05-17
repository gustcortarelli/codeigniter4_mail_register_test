<?php

namespace App\Libraries;

use CodeIgniter\API\ResponseTrait;
use ReCaptcha\ReCaptcha;
use ReCaptcha\RequestMethod\CurlPost;

class ValidateCaptcha {

    private $key;
    private $error;

    public function __construct(){
        $this->key = $_ENV['RECAPTCHA_SECRET_KEY'];
    }

    /**
     * Retrieves the public key of reCaptcha
     * 
     * @return string public key
     */
    public static function getPublicKey() {
        return $_ENV['RECAPTCHA_SITE_KEY'];
    }

    /**
     * validate the response parameter sent from frontend
     * 
     * @param string $response
     * 
     * @return bool
     */
    public function validateCaptcha(string $response) : bool {

        $recaptcha = new ReCaptcha($this->key, new CurlPost());

        if (empty($response)) {
            $this->error = lang("app.error.missing_captcha_response");
            return false;
        }

        $resp = $recaptcha->verify($response);

        if ($resp->isSuccess()) {
            return true;
        }

        $errorMessages = [];
        foreach($resp->getErrorCodes() as $value) {
            $errorMessages[] = lang("captcha.google.{$value}");
        }
        $this->error = $errorMessages;

        return false;
    }

    /**
     * Get the errors that occurs on validation
     * 
     * @return array error messages
     */
    public function getErrorMessage(){
        return $this->error;
    }

}