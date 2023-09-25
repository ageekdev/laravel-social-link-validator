<?php

namespace Ageekdev\LaravelSocialLinkValidator\Validators\Platforms;

use Ageekdev\LaravelSocialLinkValidator\Validators\AbstractValidator;

class Instagram extends AbstractValidator
{
    /** inline {@inheritdoc} */
    protected array $patterns = [
        '~instagram.com/p/([A-Za-z0-9-_.]+)/?$~i',
        '~instagram.com/pages/([A-Za-z0-9-_.]+)/?$~i',
        '~instagram.com/([A-Za-z0-9-_.]+)/?$~i',
    ];

    protected array $patternMaps = [
        ['type' => 'post', 'id' => 1],
        ['type' => 'page', 'id' => 1],
        ['type' => 'page', 'id' => 1],
    ];

    /** inline {@inheritdoc} */
    public function normalizeUrl(string $url): string
    {
        $parts = explode('?', $url);

        return $parts[0];
    }
}
