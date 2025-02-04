# Impersonator Package

## Introduction

The **Impersonator** package allows administrators to impersonate user logins within a Laravel application. This feature is useful for debugging, customer support, and administrative purposes. However, it should be used with caution to avoid security risks.

## Installation

To install the package, run the following command:

```bash
composer require mozhuilungdsuo/impersonator
```

Next, publish the package service provider and configuration file:

```bash
php artisan vendor:publish --provider="Mozhuilungdsuo\Impersonator\ImpersonateServiceProvider"
```

Run the database migrations:

```bash
php artisan migrate
```

## Configuration

After publishing, a configuration file named `impersonate.php` will be created in the `config` directory. You can use this file to define allowed and restricted email addresses for impersonation.

```php
return [
    'allowed_emails' => [
        'admin@example.com',
    ],
    'restricted_emails' => [
        'superadmin@example.com',
    ],
];
```

## Usage

### Blade Directives

#### Impersonation Button

Place the following directive in your views to add an impersonation button for a specific user:

```blade
@impersonateButton($userId)
```

#### Stop Impersonation Button

Add the following directive to your layout file to allow users to stop impersonating:

```blade
@stopImpersonationButton
```

### Customization

The views for the impersonation buttons can be customized in the `vendor/impersonate/views` directory. Modify them as needed to fit your application's UI.

## Security Warning ⚠️

**Use this package with caution.** Impersonating a user grants full access to their account, which can pose serious security and privacy risks. Ensure that only authorized administrators have permission to use this functionality.

## Developer

**Lungdsuo Mozhui**  
Email: [mozhui.lungdsuo@gmail.com](mailto:mozhui.lungdsuo@gmail.com)

## License

This package is open-source and available under the MIT License.
