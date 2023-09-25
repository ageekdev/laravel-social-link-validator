<?php

namespace AgeekDev\SocialLinkValidator\Rules;

use AgeekDev\SocialLinkValidator\SocialLinkValidator;
use Illuminate\Contracts\Validation\Rule;

class SocialLink implements Rule
{
    public function passes($attribute, $value): bool
    {
        $platform = (new SocialLinkValidator())->guess($value);

        if ($platform) {
            return (new SocialLinkValidator(config('social-link-validator.platforms')))->driver($platform)->isValid($value);
        }

        return false;
    }

    public function message(): string
    {
        return 'The :attribute is invalid.';
    }
}
