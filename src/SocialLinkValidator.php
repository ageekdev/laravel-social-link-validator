<?php

namespace AgeekDev\SocialLinkValidator;

use AgeekDev\SocialLinkValidator\Validators\ValidatorInterface;
use RuntimeException;

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
    public function __construct(?array $drivers = null)
    {
        if (is_null($drivers)) {
            $drivers = config('social-link-validator.platforms');
        }

        $this->drivers = $drivers;
    }

    public function driver(string $driver): ValidatorInterface
    {
        if (! isset($this->drivers[$driver])) {
            throw new RuntimeException(sprintf('Invalid driver %s.', $driver));
        }

        if (empty($this->instances[$driver])) {
            $this->instances[$driver] = new $this->drivers[$driver];
        }

        return $this->instances[$driver];
    }

    public function guess(string $url): ?string
    {
        foreach ($this->drivers as $driver => $class) {
            if (empty($this->instances[$driver])) {
                $this->instances[$driver] = new $class;
            }

            if ($this->instances[$driver]->isValid($url)) {
                return $driver;
            }
        }

        return null;
    }
}
