<h1 align="center">Laravel Social Link Validator</h1>

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ageekdev/laravel-social-link-validator.svg?style=flat-square)](https://packagist.org/packages/ageekdev/laravel-social-link-validator)
[![Laravel 10.x](https://img.shields.io/badge/Laravel-10.x-red.svg?style=flat-square)](https://laravel.com/docs/10.x)
[![Laravel 11.x](https://img.shields.io/badge/Laravel-11.x-red.svg?style=flat-square)](https://laravel.com/docs/11.x)
[![Laravel 12.x](https://img.shields.io/badge/Laravel-12.x-red.svg?style=flat-square)](https://laravel.com/docs/12.x)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ageekdev/laravel-social-link-validator/run-tests.yml?label=tests&style=flat-square)](https://github.com/ageekdev/laravel-social-link-validator/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/ageekdev/laravel-social-link-validator.svg?style=flat-square)](https://packagist.org/packages/ageekdev/laravel-social-link-validator)

You can validate the social profile link by using of this package.

## Installation

You can install the package via composer:

```bash
composer require ageekdev/laravel-social-link-validator
```

### Supported Platforms

| Platform Name | slug           | 
|---------------|----------------|
| Facebook      | facebook       |  
| Instagram     | instagram      |  
| Line          | line           |  
| Linkedin      | linkedin       |  
| Twitter       | twitter        |  
| Whatsapp      | whatsapp       |  
| Youtube       | youtube        |

## Usage

We can use as validation rule to validate in Request.
```php
$validated = $request->validate([
    'link' => 'social_link'
]);
```

Validate with platform slug
```php
$validated = $request->validate([
    'facebook_link' => 'social_link:facebook'
]);
```

To Check Platform of URL
```php
use AgeekDev\SocialLinkValidator\Facades\SocialLinkValidator;

$platform = SocialLinkValidator::guess($link);
```

To Validate of URL of platform
```php
use AgeekDev\SocialLinkValidator\Facades\SocialLinkValidator;

$platform = SocialLinkValidator::guess($url);

if ($platform) {
    $isValid = SocialLinkValidator::driver($platform)->isValid($url);
}
```

## Testing

```bash
composer test
```

## Request or add new platform
Please create PR or issue for it if it does not already exist.
- create new platform class in `src/Validators/Platforms` folder.
- add new class in `config/social-link-validator.php`.
- Then PR you code for review.

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
