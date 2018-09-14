<?php

namespace Zero\Storage;

use ArrayAccess;
use Countable;
use IteratorAggregate;
use JsonSerializable;
use Serializable;

/**
 * Interface StorageInterface
 * @package Zero\Storage
 */
interface StorageInterface extends Countable, JsonSerializable, Serializable, IteratorAggregate, ArrayAccess
{
    /**
     * @param string $key
     * @param null $default
     * @return mixed|null
     */
    public function &get(string $key, $default = null);

    /**
     * @param string $key
     * @param mixed $value
     */
    public function set(string $key, $value);

    /**
     * @param string $key
     */
    public function remove(string $key);

    /**
     * @param string $key
     * @param mixed $default
     * @return mixed|null
     */
    public function &pop(string $key, $default = null);

    /**
     * @param string $key
     * @return bool
     */
    public function has(string $key);

    /**
     * @param string $key
     * @return bool
     */
    public function exists(string $key);

    /**
     * @return array returns array data reference
     */
    public function &getData();

    /**
     * @return array
     */
    public function toArray();

}