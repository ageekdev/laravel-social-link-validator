<?php

namespace Ageekdev\LaravelSocialLinkValidator\Validators;

interface ValidatorInterface
{
    /**
     * @param  string|null  $url
     */
    public function isValid(string $url): bool;

    public function normalizeUrl(string $url): string;

    public function split(string $url): LinkType;
}
