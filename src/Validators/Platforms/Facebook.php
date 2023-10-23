<?php

namespace AgeekDev\SocialLinkValidator\Validators\Platforms;

use AgeekDev\SocialLinkValidator\Validators\AbstractValidator;

class Facebook extends AbstractValidator
{
    protected array $patterns = [
        '~facebook\.com/pages/([^/]+)(.*)~',
        '~facebook\.com/([^/]+)(.*)~',
    ];

    protected array $patternMaps = [
        ['type' => 'pages', 'id' => 1, 'parent_id' => null],
        ['type' => 'profile', 'id' => 1, 'parent_id' => null],
    ];
}
