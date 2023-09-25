<?php

namespace Ageekdev\LaravelSocialLinkValidator\Validators\Platforms;

use Ageekdev\LaravelSocialLinkValidator\Validators\AbstractValidator;

class Twitter extends AbstractValidator
{
    /** inline {@inheritdoc} */
    protected array $patterns = [
        '~twitter\.com/([\w\d\-_]+)/(status|moments)/([0-9]+)~i',
        '~twitter\.com/([\w\d\-_]+)~i',
    ];

    protected array $patternMaps = [
        ['type' => 2, 'id' => 3, 'parent_id' => 1],
        ['type' => 'profile', 'id' => 1, 'parent_id' => null],
    ];

    /** inline {@inheritdoc} */
    public function normalizeUrl(string $url): string
    {
        if (preg_match('~twitter\.com/(?:\#\!|/)?([\w\d\-_]+)/(status|moments)/([0-9]+)~i', $url, $matches)) {
            return 'https://twitter.com/'.$matches['1'].'/'.$matches['2'].'/'.$matches['3'];
        }

        return $url;
    }
}
