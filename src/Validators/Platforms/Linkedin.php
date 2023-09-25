<?php

namespace Ageekdev\LaravelSocialLinkValidator\Validators\Platforms;

use Ageekdev\LaravelSocialLinkValidator\Validators\AbstractValidator;

class Linkedin extends AbstractValidator
{
    /** inline {@inheritdoc} */
    protected array $patterns = [
        '~linkedin\.com/(in|company)/([^/]+)~i',
    ];

    protected array $patternMaps = [
        ['type' => 'personal', 'id' => 1],
        ['type' => 'company', 'id' => 2],
    ];
}
