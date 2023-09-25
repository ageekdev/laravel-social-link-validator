<?php

use AgeekDev\SocialLinkValidator\SocialLinkValidator;

it('should be valid platform', function ($name, $url) {
    $validator = new SocialLinkValidator();
    $result = $validator->guess($url);
    expect($result)->toBe($name);
})->with('platforms');

it('should be valid platform by driver', function ($name, $url) {
    $validator = new SocialLinkValidator();
    $result = $validator->driver($name)->isValid($url);
    expect($result)->toBeTrue();
})->with('platforms');
