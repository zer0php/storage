<?php

namespace Test\Storage;

use PHPUnit\Framework\TestCase;
use Zero\Storage\ArrayStorage;

class ArrayStorageTest extends TestCase
{
    /**
     * @test
     */
    public function get_WithEmptyData_ReturnsDefaultValue()
    {
        $storage = new ArrayStorage();
        $this->assertNull($storage->get('not-exists'));
    }

    /**
     * @test
     */
    public function get_WithData_ReturnsValue()
    {
        $data = [
            'test-key' => 'test-value'
        ];
        $storage = new ArrayStorage($data);
        $this->assertEquals('test-value', $storage->get('test-key'));
    }

    /**
     * @test
     */
    public function pop_WithData_ReturnsValueAndRemove()
    {
        $data = [
            'test-key' => 'test-value'
        ];
        $storage = new ArrayStorage($data);
        $value = $storage->pop('test-key');
        $this->assertEquals('test-value', $value);
        $this->assertFalse($storage->exists('test-key'));
    }

    /**
     * @test
     */
    public function set_WithEmptyData_ReturnsNewValue()
    {
        $storage = new ArrayStorage();
        $this->assertNull($storage->get('test-key'));
        $storage->set('test-key', 'test-value');
        $this->assertEquals('test-value', $storage->get('test-key'));
    }

    /**
     * @test
     */
    public function remove_WithData_ReturnsNull()
    {
        $data = [
            'test-key' => 'test-value'
        ];
        $storage = new ArrayStorage($data);
        $storage->remove('test-key');
        $this->assertNull($storage->get('test-key'));
    }

    /**
     * @test
     */
    public function has_WithNullData_ReturnsFalse()
    {
        $data = [
            'test-key' => null
        ];
        $storage = new ArrayStorage($data);
        $this->assertFalse($storage->has('test-key'));
    }

    /**
     * @test
     */
    public function has_WithData_ReturnsTrue()
    {
        $data = [
            'test-key' => 'test-value'
        ];
        $storage = new ArrayStorage($data);
        $this->assertTrue($storage->has('test-key'));
    }

    /**
     * @test
     */
    public function exists_WithNullData_ReturnsTrue()
    {
        $data = [
            'test-key' => null
        ];
        $storage = new ArrayStorage($data);
        $this->assertTrue($storage->exists('test-key'));
    }

    /**
     * @test
     */
    public function toArray_ReturnsData()
    {
        $data = [
            'test-key' => null
        ];
        $storage = new ArrayStorage($data);
        $this->assertSame($data, $storage->toArray());
        $storage->toArray()['test'] = 'test';
        $this->assertArrayNotHasKey('test', $data);
    }

    /**
     * @test
     */
    public function count_ReturnsArraySize()
    {
        $storage = new ArrayStorage(['1']);
        $this->assertCount(1, $storage);
        $this->assertEquals(1, $storage->count());
    }

    /**
     * @test
     */
    public function jsonSerialize_ReturnsArray()
    {
        $storage = new ArrayStorage(['1']);
        $this->assertEquals(['1'], $storage->jsonSerialize());
        $this->assertEquals('["1"]', json_encode($storage));
    }

    /**
     * @test
     */
    public function unserialize_ReturnsNewInstance()
    {
        $storage = new ArrayStorage();
        $this->assertInstanceOf(ArrayStorage::class, unserialize(serialize($storage)));
    }

    /**
     * @test
     */
    public function getIterator_ReturnsGenerator()
    {
        $storage = new ArrayStorage(['key' => 'value']);
        $generator = $storage->getIterator();
        $this->assertInstanceOf(\Generator::class, $generator);
        foreach($generator as $key => $value) {
            $this->assertEquals('key', $key);
            $this->assertEquals('value', $value);
        }
    }

    /**
     * @test
     */
    public function magicMethods_ReturnsValue()
    {
        $storage = new ArrayStorage();
        $storage->testKey = 'testValue';
        $this->assertEquals('testValue', $storage->testKey);
        $this->assertEquals('testValue', $storage->get('testKey'));
        $this->assertTrue(isset($storage->testKey));
        $this->assertTrue($storage->has('testKey'));
        unset($storage->testKey);
        $this->assertFalse(isset($storage->testKey));
        $this->assertFalse($storage->has('testKey'));
    }

    /**
     * @test
     */
    public function arrayMethods_ReturnsValue()
    {
        $storage = new ArrayStorage(['testKey' => 'testValue']);
        $storage['testKey'] = 'testValue';
        $this->assertEquals('testValue', $storage['testKey']);
        $this->assertEquals('testValue', $storage->testKey);
        $this->assertEquals('testValue', $storage->get('testKey'));
        $this->assertTrue(isset($storage['testKey']));
        $this->assertTrue(isset($storage->testKey));
        $this->assertTrue($storage->has('testKey'));
        unset($storage['testKey']);
        $this->assertFalse(isset($storage['testKey']));
        $this->assertFalse(isset($storage->testKey));
        $this->assertFalse($storage->has('testKey'));
    }

    /**
     * @test
     */
    public function magicDebugInfo_ReturnsArray()
    {
        $storage = new ArrayStorage([1]);
        $this->assertEquals([1], $storage->__debugInfo());
    }
}