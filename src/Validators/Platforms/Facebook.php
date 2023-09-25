<?php

namespace Ageekdev\LaravelSocialLinkValidator\Validators\Platforms;

use Ageekdev\LaravelSocialLinkValidator\Validators\AbstractValidator;

class Facebook extends AbstractValidator
{
    protected array $patterns = [
        '~facebook\.com/([^/]+)/(posts|activity|photos)/([^/]+)/?~i',
        '~facebook\.com/notes/([^/]+)/(?:[^/]+)/([^/]+)/?~i',
        '~facebook\.com/(photo|permalink)\.php\?(?:(?:story_)?fbid)=([^ ]+)~i',
        '~facebook\.com/(photos|questions)/([^/ ]+)/?~i',
        '~facebook\.com/media/set/?\?set=([^/ ]+)~i',
        '~facebook\.com/([^/]+)/videos/([^/]+)/?~i',
        '~facebook\.com/video\.php\?(?:id|v)=([^ ]+)~i',
        '~facebook\.com/pages/([^/]+)(.*)~',
        '~facebook\.com/([^/]+)(.*)~',
    ];

    protected array $patternMaps = [
        ['type' => 2, 'id' => 3, 'parent_id' => 1],
        ['type' => 'notes', 'id' => 2, 'parent_id' => 1],
        ['type' => 1, 'id' => 2, 'parent_id' => null],
        ['type' => 1, 'id' => 2, 'parent_id' => null],
        ['type' => 'media_set', 'id' => 1, 'parent_id' => null],
        ['type' => 'videos', 'id' => 2, 'parent_id' => 1],
        ['type' => 'videos', 'id' => 1, 'parent_id' => null],
        ['type' => 'pages', 'id' => 1, 'parent_id' => null],
        ['type' => 'profile', 'id' => 1, 'parent_id' => null],
    ];
}
