<?php

return [
    'message' => [
        // reasons messages mapped on kickbox API
        // Deliverable Results
        'accepted_email' => 'Email address was accepted by the SMTP server',
        // Risky Results
        'low_quality' => 'Email address has quality issues that may make it a risky or low-value address',
        'low_deliverability' => 'Email address appears to be deliverable, but deliverability cannot be guaranteed',
        // Undeliverable Results
        'rejected_email' => 'Email address was rejected by the SMTP server, email address does not exist',
        'invalid_domain' => 'Domain for email does not exist',
        'invalid_email' => 'Specified email is not a valid email address syntax',
        'invalid_smtp' => 'Invalid e-mail: SMTP server returned an unexpected/invalid response',
        // Unknown Results
        'no_connect' => 'Invalid e-mail: Could not connect to SMTP server',
        'timeout' => 'SMTP session timed out',
        'unavailable_smtp' => 'SMTP server was unavailable to process our request',
        'unexpected_error' => 'An unexpected error has occurred',
    ]
];