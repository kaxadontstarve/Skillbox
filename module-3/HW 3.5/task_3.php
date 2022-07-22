<?php
echo 'Задание 1-3.';
echo '<br>';
$a = rand(1, 9);
$b = 10 * rand(1, 3);
$c = $a * $b;
$c = $c + rand(1, 100);

var_dump($a);
echo '<br>';
var_dump($b);
echo '<br>';
var_dump($c);
echo '<br>';
echo '<hr><br>';
echo 'Задание 4-6.';
echo '<br>';
switch (true) {
    case $c >= 0 && $c < 100:
        echo "1";
        break;
    case $c >= 100 && $c < 200:
        echo "2";
        break;
    case $c >= 200 && $c < 300:
        echo "3";
        break;
    default:
        echo "Ловушка";
        break;
}
