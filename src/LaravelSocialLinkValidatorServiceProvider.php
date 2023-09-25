<?php

namespace Ageekdev\LaravelSocialLinkValidator;

use Ageekdev\LaravelSocialLinkValidator\Rules\SocialLink;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class LaravelSocialLinkValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
            $this->publishes([
                __DIR__.'/config/config.php' => config_path('laravel-social-link-validator.php'),
            ], 'config');

            $this->mergeConfigFrom(__DIR__.'/config/config.php', 'laravel-social-link-validator');

            Validator::extend('social_link', function ($attribute, $value, $parameters, $validator) {
                $customRule = new SocialLink(); // Create an instance of your custom rule class
                return $customRule->passes($attribute, $value);
            });

            Validator::replacer('social_link', function ($message, $attribute, $rule, $parameters) {
                return str_replace(':attribute', $attribute, 'The :attribute is invalid.');
            });
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
        $this->app->singleton('laravel-social-link-validator', function () {
            $config = require_once realpath(__DIR__.'/../src/config/config.php');

            return new SocialLinkValidator($config);
        });
    }
}
