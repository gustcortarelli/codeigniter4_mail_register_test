<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Entities\EmailEntity;
use App\Models\EmailModel;
use App\Libraries\ValidateCaptcha;
use CodeIgniter\API\ResponseTrait;
use App\Libraries\HttpStatus;

class EmailController extends Controller {

    use ResponseTrait;

    /**
     * Return the resources and data that are necessary on frontend
     * 
     * @return array
     */
    public function getData() {
        return $this->respond([
            "resources" => [
                'captcha_is_required' => lang("app.error.captcha_is_required"),
                'request_error' => lang("app.error.request_error")
            ],
            "data" => [
                "captcha_public_key" => ValidateCaptcha::getPublicKey()
            ]
        ]);
    }

    /**
     * Get all registered emails
     * @return array of EmailEntity
     */
    public function findAll() {
        $emailModel = new EmailModel();
        return $this->respond($emailModel->findAll());
    }

    /**
     * Register the email on database
     * 
     * @return respond
     */
    public function create() {
        
        $validateCaptcha = new ValidateCaptcha();
        if(!$validateCaptcha->validateCaptcha($this->request->getPost("g-recaptcha-response"))) {
            return $this->fail($validateCaptcha->getErrorMessage(), HttpStatus::INVALID_DATA, null, lang("app.error.captcha_validation_error"));
        }

        $emailModel = new EmailModel();
        $emailEntity = new EmailEntity($this->request->getPost());
        
        if (! $emailModel->save($emailEntity) ) {
            return $this->fail($emailModel->errors(), HttpStatus::INVALID_DATA);
        }

        return $this->respondCreated('', lang("app.email.message.created"));
    }

    

}