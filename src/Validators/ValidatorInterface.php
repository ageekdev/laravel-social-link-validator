<?php

namespace AgeekDev\SocialLinkValidator\Validators;

interface ValidatorInterface
{
    public function isValid(string $url): bool;

    public function normalizeUrl(string $url): string;

    public function split(string $url): LinkType;
}
