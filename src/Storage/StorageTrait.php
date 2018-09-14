<?php
namespace Zero\Storage;

trait StorageTrait
{
    /**
     * @var array
     */
    private $data;

    /**
     * @param string $key
     * @return mixed
     */
    public function &__get($key)
    {
        return $this->get($key);
    }

    /**
     * @param string $key
     * @param mixed $value
     */
    public function __set($key, $value)
    {
        $this->set($key, $value);
    }

    /**
     * @param string $key
     * @return bool
     */
    public function __isset($key)
    {
        return $this->has($key);
    }

    /**
     * @param string $key
     */
    public function __unset($key)
    {
        $this->remove($key);
    }

    /**
     * @return array
     */
    public function __debugInfo()
    {
        return $this->toArray();
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function &offsetGet($key)
    {
        return $this->get($key);
    }

    /**
     * @param string $key
     * @param string $value
     */
    public function offsetSet($key, $value)
    {
        $this->set($key, $value);
    }

    /**
     * @param string $key
     * @return bool
     */
    public function offsetExists($key)
    {
        return $this->has($key);
    }

    /**
     * @param string $key
     */
    public function offsetUnset($key)
    {
        $this->remove($key);
    }

    /**
     * {@inheritDoc}
     */
    public function &get(string $key, $default = null)
    {
        if ($this->has($key)) {
            return $this->data[$key];
        }
        return $default;
    }

    /**
     * {@inheritDoc}
     */
    public function set(string $key, $value)
    {
        $this->data[$key] = $value;
    }

    /**
     * {@inheritDoc}
     */
    public function remove(string $key)
    {
        if ($this->exists($key)) {
            unset($this->data[$key]);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function &pop(string $key, $default = null)
    {
        $value = &$this->get($key, $default);
        $this->remove($key);
        return $value;
    }

    /**
     * {@inheritDoc}
     */
    public function has(string $key)
    {
        return isset($this->data[$key]);
    }

    /**
     * {@inheritDoc}
     */
    public function exists(string $key)
    {
        return array_key_exists($key, $this->data);
    }

    /**
     * {@inheritDoc}
     */
    public function &getData()
    {
        return $this->data;
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {
        return $this->data;
    }

    /**
     * {@inheritDoc}
     */
    public function count()
    {
        return count($this->data);
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize()
    {
        return $this->data;
    }

    /**
     * {@inheritDoc}
     */
    public function serialize()
    {
        return serialize($this->data);
    }

    /**
     * {@inheritDoc}
     */
    public function unserialize($serialized)
    {
        $this->data = unserialize($serialized);
    }

    /**
     * {@inheritDoc}
     */
    public function getIterator()
    {
        foreach ($this->data as $k => $v) {
            yield $k => $v;
        }
    }

    /**
     * @param array $data
     */
    protected function setData(array &$data)
    {
        $this->data = &$data;
    }
}