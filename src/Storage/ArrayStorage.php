<?php

namespace Zero\Storage;

/**
 * Class Storage
 * @package Zero\Storage
 */
class ArrayStorage extends AbstractStorage
{
    /**
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->setData($data);
    }
}