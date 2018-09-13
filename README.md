# ZeroPHP Storage


ArrayStorage: 

```php
use Zero\Storage\ArrayStorage;

$data = [
    'key' => 'value',
    'keyNull' => null
];

$storage = new ArrayStorage($data); //or Zero\Storage\SessionStorage;

$storage->get('key'); //value

$storage->key; //value
$storage['key']; //value
$storage->has('key'); //true
$storage->has('keyNull'); //false
$storage->exists('keyNull'); //true
isset($storage->key); //true
isset($storage['key']); //true

$storage->set('test', 'value');
$storage->test = value;
$storage['test'] = value;

$storage->has('test'); //true

$storage->remove('test');
unset($storage->test);
unset($storage['test']);

$storage->has('test');//false
```