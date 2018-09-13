<?php

namespace Test\Storage;

use PHPUnit\Framework\TestCase;
use Zero\Storage\SessionStorage;

class SessionStorageTest extends TestCase
{

    protected function setUp()
    {
        $_SESSION = [];
    }

    /**
     * @test
     */
    public function get_WithData_ReturnsReferencedValue()
    {
        $_SESSION = [
            'test-key' => [
                'test-key2' => null,
                'testKey3' => null
            ]
        ];
        $storage = new SessionStorage();
        $storage->get('test-key')['test-key2'] = 'test-value2';
        $storage->{'test-key'}['testKey3'] = 'test-value3';
        $storage['test-key']['testKey4'] = 'test-value4';
        $this->assertEquals('test-value2', $_SESSION['test-key']['test-key2']);
        $this->assertEquals('test-value3', $_SESSION['test-key']['testKey3']);
        $this->assertEquals('test-value4', $_SESSION['test-key']['testKey4']);
    }

    /**
     * @test
     */
    public function set_WithData_EditReference()
    {
        $storage = new SessionStorage();
        $storage->set('test-key', 'test-value');
        $storage->testKey2 = 'test-value2';
        $storage['testKey3'] = 'test-value3';
        $this->assertEquals('test-value', $_SESSION['test-key']);
        $this->assertEquals('test-value2', $_SESSION['testKey2']);
        $this->assertEquals('test-value3', $_SESSION['testKey3']);
    }

    /**
     * @test
     */
    public function remove_WithData_RemoveDataFromReference()
    {
        $_SESSION = [
            'test-key' => null,
            'testKey2' => null,
            'testKey3' => null
        ];
        $storage = new SessionStorage();
        $this->assertNotEmpty($_SESSION);
        $storage->remove('test-key');
        unset($storage->testKey2);
        unset($storage['testKey3']);
        $this->assertEmpty($_SESSION);
    }

    /**
     * @test
     */
    public function getData_ReturnsReferencedData()
    {
        $_SESSION = [
            'test-key' => null
        ];
        $storage = new SessionStorage();
        $this->assertSame($_SESSION, $storage->getData());
        $storage->getData()['test'] = 'test';
        $this->assertSame($_SESSION['test'], 'test');
    }

}