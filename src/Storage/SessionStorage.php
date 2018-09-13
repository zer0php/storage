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
        if( !isset($_SESSION) ) {
            $_SESSION = [];
        }
        $this->setData($_SESSION);
    }
}
