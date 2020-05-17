<?php

namespace App\Libraries;

use App\Libraries\CurlRequest;

class ValidateEmail {

    const BASE_URL = "https://api.kickbox.com/v2/verify?";

    /**
     * Defines the acceptance of results from e-mail validation:
     *  - 1: DELIVERABLE and UNKNOWN results are acceptables 
     *  - 2: DELIVERABLE and RISKY results are acceptables 
     *  - 3: only DELIVERABLE is accepted
     *  any other value will assumes the following behavior: DELIVERABLE, UNKNOWN and RISKY e-mail are acceptables
     */
    private $acceptanceLevel = "";
    private $key;
    private $error = "";

    const DELIVERABLE = "deliverable";
    const UNDELIVERABLE = "undeliverable";
    const RISKY = "risky";
    const UNKNOWN = "unknown";

    public function __construct() {
        $this->acceptanceLevel = $_ENV['validatemail.KICKBOX.ACCEPTANCE_LEVEL'];
        $this->key = $_ENV['validatemail.KICKBOX.key'];
    }

    /**
     * Check if the assigned e-mail is valid following the API rules and 
     * acceptance level (env variable).
     * 
     * @param string $email
     * 
     * @return bool
     */
    public function isValid(string $email) : bool {
        $curlRequest = new CurlRequest($this->getUrl($email), true);
        if(!$curlRequest->execute()){
            $this->error = $curlRequest->getError();
            return false;
        }

        return $this->validateResponse($curlRequest->getResponseJson());
    }

    /**
     * Build the URL to perform the request operation
     * 
     * @param string $email
     * 
     * @return string
     */
    private function getUrl(string $email) : string {
        $encodedParameters = "email=".urlencode($email)."&apikey=" . $this->key;
        return self::BASE_URL . $encodedParameters;
    }

    /**
     * Check if the response API
     * 
     * @param mixed $response
     * 
     * @return bool
     */
    private function validateResponse($response) : bool {
        if (!$response->success) {
            $this->error = $response->message;
            return false;
        }
        
        if($response->result == self::DELIVERABLE){
            return true;
        }

        if($this->checkAcceptanceLevel($response->result)) {
            return true;
        }

        $this->error = lang("kickbox.message." . $response->reason);

        return false;
    }

    /**
     * Second level validation, check if the email is valid according to the accpetance level
     * 
     * @param string $requestResult
     * @return bool
     */
    private function checkAcceptanceLevel($requestResult) : bool {
        switch ($this->acceptanceLevel) {
            case 1:
                return in_array($requestResult, [self::UNKNOWN]);
            case 2:
                return in_array($requestResult, [self::RISKY]);
            case 3:
                return false;
            default:
                return in_array($requestResult, [self::UNKNOWN, self::RISKY]);
        }
    }

    /**
     * Return the error message
     * 
     * @return string
     */
    public function getErrorMessage() : string {
        return $this->error;
    }

}