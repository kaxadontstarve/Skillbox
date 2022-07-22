<?php
echo "<font color=\"red\">Задание 1-4:</font><br>";
$word = 'perfect';
$shift = 5;
$i = 0;
while ($i < strlen($word)) {
    $word[$i] = chr(ord($word[$i]) + $shift);
    $i++;
}
echo "Зашифрованое слово::$word";
echo "<br>";

echo "<font color=\"red\">Задание 5-6:</font><br>";
$i = 0;
while ($i < strlen($word)) {
    $word[$i] = chr(ord($word[$i]) - $shift);
    $i++;
}
echo "Разшифрованое слово::$word";
