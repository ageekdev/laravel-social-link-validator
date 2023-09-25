<?php

namespace AgeekDev\SocialLinkValidator\Rules;

use AgeekDev\SocialLinkValidator\SocialLinkValidator;
use Illuminate\Contracts\Validation\Rule;

class SocialLink implements Rule
{
    public function __construct(
        protected array $parameters
    ) {
    }

    public function passes($attribute, $value): bool
    {
        if (($platform = $this->parameters[0]) && ! in_array($platform, array_keys(config('social-link-validator')))) {
            return false;
        }

        if (empty($platform)) {
            $platform = (new SocialLinkValidator())->guess($value);
        }

        if ($platform) {
            return (new SocialLinkValidator(config('social-link-validator')))->driver($platform)->isValid($value);
        }

        return false;
    }

    public function message(): string
    {
        return 'The :attribute is invalid.';
    }
}
