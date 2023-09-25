<?php

namespace Ageekdev\LaravelSocialLinkValidator\Rules;

use Ageekdev\LaravelSocialLinkValidator\SocialLinkValidator;
use Illuminate\Contracts\Validation\Rule;

class SocialLink implements Rule
{
    public function passes($attribute, $value): bool
    {
        $platform = (new SocialLinkValidator())->guess($value);

        if ($platform) {
            return (new SocialLinkValidator(config('laravel-social-link-validator')))->driver($platform)->isValid($value);
        }

        return false;
    }

    public function message(): string
    {
        return 'The :attribute is invalid.';
    }
}
