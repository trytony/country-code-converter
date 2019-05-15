<?php

namespace Zhangbingliang\CountryCodeConverter;

use Zhangbingliang\CountryCodeConverter\Exceptions\MissingConfigException;

abstract class CodeConverter
{
    private $mappings;

    /**
     * CodeConverter constructor.
     *
     * @param string $mappings
     * @throws MissingConfigException
     */
    public function __construct(array $mappings)
    {
        if ($mappings) {
            $this->mappings = $mappings;
            return;
        }

        throw new MissingConfigException('Missing config file.');
    }

    /**
     * Return the code for the given name
     *
     * @param $value
     * @return mixed
     */
    public function getCode($value)
    {
        return self::first(
            $this->mappings,
            function ($code, $name) use ($value)
            {
                return strtolower($name) == strtolower($value);
            },
            $value
        );
    }
    /**
     * Return the name for the given code
     *
     * @param $value
     * @return mixed
     */
    public function getName($value)
    {
        return self::first(
            array_flip($this->mappings),
            function ($name, $code) use ($value)
            {
                return strtolower($code) == strtolower($value);
            },
            $value
        );
    }

    /**
     * @param $array
     * @param callable $callback
     * @param null $default
     * @return mixed
     */
    private static function first($array, callable $callback, $default = null)
    {
        foreach ($array as $key => $value) {
            if (call_user_func($callback, $value, $key)) {
                return $value;
            }
        }
        return self::value($default);
    }

    /**
     * @param $value
     * @return mixed
     */
    private static function value($value)
    {
        return $value instanceof \Closure ? $value() : $value;
    }
}