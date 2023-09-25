<?php

namespace AgeekDev\SocialLinkValidator\Validators\Platforms;

use AgeekDev\SocialLinkValidator\Validators\AbstractValidator;

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
