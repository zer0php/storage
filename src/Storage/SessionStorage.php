<?php

namespace Zero\Storage;

/**
 * Class SessionStorage
 * @package Zero\Storage
 */
class SessionStorage extends AbstractStorage
{
    public function __construct()
    {
        $this->setData($_SESSION);
    }
}