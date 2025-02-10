```php
function processArray(array $arr): array {
  foreach ($arr as &$value) {
    $value = $value * 2; // Modify the value directly
  }
  return $arr;
}

$numbers = [1, 2, 3, 4, 5];
$result = processArray($numbers);
print_r($result); // Output: Array ( [0] => 2 [1] => 4 [2] => 6 [3] => 8 [4] => 10 )

$moreNumbers = [10,20,30];
$moreResult = processArray($moreNumbers);
print_r($moreResult); // Output: Array ( [0] => 20 [1] => 40 [2] => 60 )

// Unexpected behavior with objects
class MyClass {
    public $value;
    public function __construct($val){
        $this->value = $val;
    }
}

$objects = [new MyClass(1), new MyClass(2), new MyClass(3)];
$objectResult = processArray($objects);
print_r($objectResult); //Output: Array ( [0] => 2 [1] => 4 [2] => 6 ) // Notice the change in output
//Expected Output: Array ( [0] => MyClass Object ( [value] => 2 ) [1] => MyClass Object ( [value] => 4 ) [2] => MyClass Object ( [value] => 6 ) )
```