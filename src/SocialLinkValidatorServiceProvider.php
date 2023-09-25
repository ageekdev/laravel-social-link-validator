<?php

namespace AgeekDev\SocialLinkValidator;

use AgeekDev\SocialLinkValidator\Rules\SocialLink;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class SocialLinkValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/social-link-validator.php' => config_path('social-link-validator.php'),
        ], 'config');

        Validator::extend('social_link', function ($attribute, $value, $parameters, $validator) {
            return (new SocialLink($parameters))->passes($attribute, $value);
        });

        Validator::replacer('social_link', function ($message, $attribute, $rule, $parameters) {
            if (isset($parameters[0]) && $platform = $parameters[0]) {
                return str_replace([':attribute', ':platform'], [$attribute, $platform], 'The :attribute is invalid for :platform platform');
            }

            return str_replace(':attribute', $attribute, 'The :attribute is invalid. ');
        });
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/social-link-validator.php', 'social-link-validator');

        $this->app->singleton('laravel-social-link-validator', function ($app) {
            return new SocialLinkValidator();
        });
    }
}
