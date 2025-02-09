<?php

return [
    

    /*
    |--------------------------------------------------------------------------
    | Impersonation Enabled
    |--------------------------------------------------------------------------
    |
    | This option controls whether impersonation is enabled.
    | Set to true to allow users to impersonate other users.
    |
    */
    'enabled' => false,


    /*
    |--------------------------------------------------------------------------
    | Allowed Emails for Impersonation
    |--------------------------------------------------------------------------
    |
    | Define the emails that are allowed to be impersonated.
    | Example: ['user@example.com', 'test@example.com']
    |
    */
    'allowed_emails' => [],

    /*
    |--------------------------------------------------------------------------
    | Restricted Emails
    |--------------------------------------------------------------------------
    |
    | Define the emails that cannot be impersonated.
    | Example: ['sadmin@credit.com']
    |
    */
    'restricted_emails' => [''],
];
