<?php

namespace Ageekdev\LaravelSocialLinkValidator\Validators\Platforms;

use Ageekdev\LaravelSocialLinkValidator\Validators\AbstractValidator;

class Line extends AbstractValidator
{
    /** inline {@inheritdoc} */
    protected array $patterns = [
        '~line\.me\/R\/ti\/p\/\~([^/]+)(.*)~',
    ];

    protected array $patternMaps = [
        ['type' => 'profile', 'id' => 1],
    ];
}
