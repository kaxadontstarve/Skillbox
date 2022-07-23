<?php
echo 'Задание 1-3.';
echo '<br>';
$a = 9;
$b = 10 * rand(1,3); 

var_dump($a);
echo '<br>';
var_dump($b);
echo '<hr><br>';
echo 'Задание 4.';
echo '<br>';
if ($a * $b < 100) {
    echo "1. меньше 100";
} elseif ($a * $b < 200) {
    echo "2. меньше 200";
} else {
    echo "3. всё остальное"; 
}
