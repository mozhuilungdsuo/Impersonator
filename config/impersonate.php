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
    | Allowed Emails for impersonating other users
    |--------------------------------------------------------------------------
    |
    | Define the emails that are allowed to impersonate other users.
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
