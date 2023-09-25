<?php

namespace Ageekdev\LaravelSocialLinkValidator;

use Ageekdev\LaravelSocialLinkValidator\Validators\ValidatorInterface;
use Illuminate\Foundation\Application as LaravelApplication;
use Laravel\Lumen\Application as LumenApplication;

class SocialLinkValidator
{
    protected array $drivers = [];

    /**
     * @var ValidatorInterface[]
     */
    protected array $instances = [];

    /**
     * Validator constructor.
     */
    public function __construct(array $drivers = null)
    {
        if (is_null($drivers)) {
            if ((app() instanceof LaravelApplication && app()->runningInConsole()) || app() instanceof LumenApplication) {
                $drivers = config('laravel-social-link-validator');
            } else {
                $drivers = require realpath(__DIR__.'/../src/config/config.php');
            }
        }

        $this->drivers = $drivers;
    }

    public function driver(string $driver): ValidatorInterface
    {
        if (! isset($this->drivers[$driver])) {
            throw new \RuntimeException(sprintf('Invalid driver %s.', $driver));
        }

        if (empty($this->instances[$driver])) {
            $this->instances[$driver] = new $this->drivers[$driver]();
        }

        return $this->instances[$driver];
    }

    public function guess(string $url): ?string
    {
        foreach ($this->drivers as $driver => $class) {
            if (empty($this->instances[$driver])) {
                $this->instances[$driver] = new $class();
            }

            if ($this->instances[$driver]->isValid($url)) {
                return $driver;
            }
        }

        return null;
    }
}
