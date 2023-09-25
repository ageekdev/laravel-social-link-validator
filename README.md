<h1 align="center">Laravel Social Link Validator</h1>

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ageekdev/laravel-social-link-validator.svg?style=flat-square)](https://packagist.org/packages/ageekdev/laravel-social-link-validator)
[![Laravel 9.x](https://img.shields.io/badge/Laravel-9.x-red.svg?style=flat-square)](https://laravel.com/docs/9.x)
[![Laravel 10.x](https://img.shields.io/badge/Laravel-10.x-red.svg?style=flat-square)](http://laravel.com)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ageekdev/laravel-social-link-validator/run-tests.yml?label=tests&style=flat-square)](https://github.com/ageekdev/laravel-social-link-validator/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/ageekdev/laravel-social-link-validator.svg?style=flat-square)](https://packagist.org/packages/ageekdev/laravel-social-link-validator)

You can validate the social profile link by using of this package.

## Installation

You can install the package via composer:

```bash
composer require ageekdev/laravel-social-link-validator
```

## Supported Platforms
- Facebook
- Instagram
- Line
- Linkedin
- Twitter
- Whatsapp
- Youtube

Ps : you can add new platform by yourself in `src/Validators/Platforms` folder

## Usage

We can use as validation rule to validate in Request.

```php
$validated = $request->validate([
    'link' => 'social_link'
]);
```

To Check Platform of url
```php
use AgeekDev\SocialLinkValidator\Facades\Barcode;

$platform = SocialLinkValidator::guess($link);
```

To Validate of url of platform
```php
use AgeekDev\SocialLinkValidator\Facades\Barcode;

$platform = SocialLinkValidator::guess($value);

if ($platform) {
    $isValid = SocialLinkValidator::driver($platform)->isValid($value);
}
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Credits

- [Ye Thu Soe](https://github.com/yethusoe91)
- [All Contributors](../../contributors)

This package contains code copied from [Social Validate](https://github.com/cfpinto/social-validate)

## License

GPL-3.0 license. Please see [License File](LICENSE.md) for more information.
