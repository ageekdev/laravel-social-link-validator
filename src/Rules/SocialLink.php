<?php

namespace AgeekDev\SocialLinkValidator\Rules;

use AgeekDev\SocialLinkValidator\Facades\SocialLinkValidator;
use Illuminate\Contracts\Validation\Rule;

class SocialLink implements Rule
{
    public function __construct(
        protected array $parameters
    ) {}

    public function passes($attribute, $value): bool
    {
        if (($platform = $this->parameters[0]) && ! in_array($platform, array_keys(config('social-link-validator.platforms')))) {
            return false;
        }

        if (empty($platform)) {
            $platform = SocialLinkValidator::guess($value);
        }

        if ($platform) {
            return SocialLinkValidator::driver($platform)->isValid($value);
        }

        return false;
    }

    public function message(): string
    {
        return 'The :attribute is invalid.';
    }
}
