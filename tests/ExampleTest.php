<?php

use Ageekdev\LaravelSocialLinkValidator\SocialLinkValidator;

test('should be valid http', function () {

    $url = 'https://facebook.com/ageekdev';

    $validator = new SocialLinkValidator();

    $result = $validator->guess($url);

    expect($result)->toBe('facebook');

});
