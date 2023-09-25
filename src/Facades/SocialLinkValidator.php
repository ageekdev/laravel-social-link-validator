<?php

namespace AgeekDev\SocialLinkValidator\Facades;

use AgeekDev\SocialLinkValidator\Validators\ValidatorInterface;
use Illuminate\Support\Facades\Facade;

/**
 * @method static string|null guess(string $url)
 * @method static ValidatorInterface driver(string $driver)
 *
 * @see \AgeekDev\SocialLinkValidator\SocialLinkValidator
 */
class SocialLinkValidator extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-social-link-validator';
    }
}
