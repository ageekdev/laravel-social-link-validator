## Laravel Social Link Validator

This package is a fork of https://github.com/cfpinto/social-validate repo.


You can validate the social profile link by using of this package.

## Installation

You can install the package via composer:

```bash
composer require ageekdev/laravel-social-link-validator
```

## Usage

We can use as validation rule to validate in Request.

```php
$validated = $request->validate([
    'link' => 'social_link'
]);
```

To Check Platform of url
```php
$platform = (new SocialLinkValidator())->guess($link);
```

To Validate of url of platform
```php
$platform = (new SocialLinkValidator())->guess($value);

if ($platform) {
    $isValid = (new SocialLinkValidator())->driver($platform)->isValid($value);
}
```

### Testing

```bash
./vendor/bin/pest
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email mr.yethusoe@gmail.com instead of using the issue tracker.

## Credits

- [Claudio Pinto](https://github.com/cfpinto)
- [All Contributors](../../contributors)

## License

GPL-3.0 license. Please see [License File](LICENSE.md) for more information.
