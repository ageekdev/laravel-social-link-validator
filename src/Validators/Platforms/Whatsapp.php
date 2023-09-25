<?php

namespace Ageekdev\LaravelSocialLinkValidator\Validators\Platforms;

use Ageekdev\LaravelSocialLinkValidator\Validators\AbstractValidator;

class Whatsapp extends AbstractValidator
{
    /** inline {@inheritdoc} */
    protected array $patterns = [
        '~wa\.me/([^/]+)(.*)~',
    ];

    protected array $patternMaps = [
        ['type' => 'profile', 'id' => 1],
    ];
}
