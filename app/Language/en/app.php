<?php

return [
    'label' => [
        'user'    => 'Username',
        'email'   => 'Email address',
        'signup'  => 'Sign up',
        'registered_at'  => 'Registered at',
        'warning' => 'Warning',
        'loading' => 'Loading',
        'back_registration_page' => 'Back to registration page'
    ],
    'email' => [
        'message' => [
            'created' => 'E-mail registered successfully',
            // error messages
            'error_email_is_unique' => 'The informed email is already registered',
            'error_email_required' => 'The field email adress is required',
            'error_email_max_length' => 'The field email adress exceeds the max column size',
            'error_user_required' => 'The field username is required',
            'error_user_max_length' => 'The field username exceeds the max column size',
        ],
        'register_message' => 'Inform username and e-mail'
    ],
    'error' => [
        'captcha_validation_error' => 'Error on reCAPTCHA validation',
        'captcha_is_required' => 'Please verify reCAPTCHA',
        'missing_captcha_response' => 'The verification token is missing',
        'request_error' => 'Unexpected error on request'
    ]
];