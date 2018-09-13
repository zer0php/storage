# ZeroPHP Storage

[![Build Status](https://travis-ci.com/zer0php/storage.svg?branch=master)](https://travis-ci.com/zer0php/storage)
[![Coverage Status](https://coveralls.io/repos/github/zer0php/storage/badge.svg?branch=master)](https://coveralls.io/github/zer0php/storage?branch=master)

```php
$storage = new \Zero\Storage\ArrayStorage([
  'key' => 'value',
  'keyNull' => null
]); 
// $storage = new \Zero\Storage\SessionStorage(); 

$storage->get('key'); //value
$storage->get('not-exists', 'defaultValue'); //defaultValue

$storage->key; //value
$storage['key']; //value
$storage->has('key'); //true
$storage->has('keyNull'); //false
$storage->exists('keyNull'); //true
isset($storage->key); //true
isset($storage['key']); //true

$storage->set('newKey', 'value');
$storage->newKey = value;
$storage['newKey'] = value;

$storage->has('newKey'); //true

$storage->remove('newKey');
//unset($storage->newKey);
//unset($storage['newKey']);

$storage->has('test'); //false
```
