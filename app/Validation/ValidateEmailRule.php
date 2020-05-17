<?php

namespace App\Validation;

use App\Libraries\ValidateEmail;

class ValidateEmailRule {

    /**
     * Check if this email is a real and valid email
     */
    public function my_email_validation(string $email, string &$error = null) : bool {
        // check email is valid
        $validateEmail = new ValidateEmail();
        if(!$validateEmail->isValid($email)){
            $error = $validateEmail->getErrorMessage();
            return false;
        }

        return true;
    }

}