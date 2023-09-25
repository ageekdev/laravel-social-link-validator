<?php

use AgeekDev\SocialLinkValidator\Facades\SocialLinkValidator;

it('should be valid platform', function ($name, $url) {
    $result = SocialLinkValidator::guess($url);
    expect($result)->toBe($name);
})->with('platforms');

it('should be valid platform by driver', function ($name, $url) {
    $result = SocialLinkValidator::driver($name)->isValid($url);
    expect($result)->toBeTrue();
})->with('platforms');
