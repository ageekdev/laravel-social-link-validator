<?php

namespace AgeekDev\SocialLinkValidator\Validators;

abstract class AbstractValidator implements ValidatorInterface
{
    protected array $patterns = ['~will fail~'];

    protected array $patternMaps = ['fail', 0];

    /**
     * Normalizes url.
     * This method should be overwritten by the
     * driver itself, if needed.
     */
    public function normalizeUrl(string $url): string
    {
        return $url;
    }

    final public function isValid(string $url): bool
    {
        return $this->split($url)->isValid;
    }

    final public function split(string $url): LinkType
    {
        $result = new LinkType();
        $patterns = $this->patterns;
        $patternMaps = $this->patternMaps;

        foreach ($patterns as $idx => $pattern) {
            if (preg_match($pattern, $url, $matches)) {
                $result->isValid = true;
                $result->id = $matches[$patternMaps[$idx]['id']];
                $result->type = is_numeric($patternMaps[$idx]['type']) ?
                    $matches[$patternMaps[$idx]['type']] :
                    $patternMaps[$idx]['type'];

                break;
            }
        }

        return $result;
    }
}
