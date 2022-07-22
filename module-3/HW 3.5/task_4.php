<?php
echo 'Задание 1-2.';
echo '<br>';
$a = rand(0, 1);
($a == 0) ? $b = null : $b = rand(1,3);

var_dump($a);
echo '<br>';
var_dump($b);
echo '<br><hr>';
echo 'Задание 3.';
echo '<br>';
switch ($b) {
    case null:
        echo "Сверстать всех на верх, переменная равна NULL";
        break;
    case 1:
        echo "разрази меня гром, переменная равна 1";
        break;
    
    default:
        echo "Я камушек О_о_О";
        break;
}
echo '<br><hr>';
echo 'Задание 4.';
echo '<br>';
if (isset($b)) {
    var_dump((bool)$b);
}else {
    echo "Переменная не определена";
}
echo '<br><hr>';
echo 'Задание 5.';
echo '<br>';

    $c = $b ?? rand(20, 30);

    var_dump($c);

