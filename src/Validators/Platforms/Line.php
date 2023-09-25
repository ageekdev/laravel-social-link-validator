<?php

namespace AgeekDev\SocialLinkValidator\Validators\Platforms;

use AgeekDev\SocialLinkValidator\Validators\AbstractValidator;

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
