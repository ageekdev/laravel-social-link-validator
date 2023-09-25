<?php

namespace AgeekDev\SocialLinkValidator\Tests;

use AgeekDev\SocialLinkValidator\SocialLinkValidatorServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    /**
     * @param  \Illuminate\Foundation\Application  $app
     */
    protected function getPackageProviders($app): array
    {
        return [
            SocialLinkValidatorServiceProvider::class,
        ];
    }
}
