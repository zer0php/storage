# ZeroPHP Storage


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