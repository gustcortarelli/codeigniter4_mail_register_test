<?php

namespace App\Libraries;

class CurlRequest {

    private $curlHandle;
    /**
     * store the last session execution response
     * @var mixed
     */
    private $response;

    /**
     * Initialize a curl to the assigned url
     * 
     * @param string $url 
     * @param bool $defaultParameters 
     *  a boolean parameter whom defines if it should assign de default parameters
     *  to perform a GET operation or not. 
     * 
     */
    public function __construct(string $url, bool $defaultParameters = false) {
        $this->curlHandle = curl_init($url);
        if ($defaultParameters) {
            $this->setDefaultGetRequestParameters();
        }
    }

    /**
     * Set default options to perform a simple GET operation
     * 
     */
    public function setDefaultGetRequestParameters() {
        $options = array(
            CURLINFO_HEADER_OUT => false,
            CURLOPT_HEADER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => true
        );
        curl_setopt_array($this->curlHandle, $options);
    }

    /**
     * Set multiple options on current cURL transfer session
     * 
     * @param array $options
     */
    public function setParameters(array $options) {
        curl_setopt_array($this->curlHandle, $options);
    }

    /**
     * Set an option on current cURL transfer session
     * 
     * @param array $option
     * @param mixed $value
     */
    public function setParameter(string $option, $value) {
        curl_setopt($this->curlHandle, $options, $value);
    }

    /**
     * Perform a cURL session
     */
    public function execute() {
        $this->response = curl_exec($this->curlHandle);
        return $this->response !== false;
    }

    /**
     * Return a string containing the last error for the current session
     * 
     * @return string error message
     */
    public function getError() {
        return curl_error($this->curlHandle);
    }

    /**
     * Return the result of current cURL session
     * 
     * @return mixed
     */
    public function getResponse() {
        return $this->response;
    }

    /**
     * Return the result of current cURL session parsed to json
     * 
     * @param bool $assoc
     * 
     * @return mixed
     */
    public function getResponseJson(bool $assoc = false) {
        return json_decode($this->response, $assoc);
    }

    /**
     * Close the current cURL session
     */
    public function __destruct() {
        curl_close($this->curlHandle);
    }

}