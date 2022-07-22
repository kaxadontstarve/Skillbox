<?php
echo "<font color=\"red\">Задание 1-5:</font><br>";

for ($i = 0; $i <= 999; $i++) {
    $letter1 = strtoupper(chr(rand(97, 98)));
    $letter2 = strtoupper(chr(rand(97, 98)));
    $letter3 = strtoupper(chr(rand(97, 98)));
    $number[] = $letter1 . str_pad($i, 3, '0', STR_PAD_LEFT) . $letter2 . $letter3;
}

foreach ($number as $key => $arrElement) {
    echo "avtoNumber# $key :: $arrElement<br>";
}

echo "<font color=\"red\">Задание 6-7:</font><br>";

echo "Final array:<br>";
foreach ($number as $key => $arrElement) {

    if ($arrElement[1] != $arrElement[2] || $arrElement[2] != $arrElement[3] || $arrElement[1] != $arrElement[3]) {
             array_splice($number, $key, 1);
    }
 
}
if (!empty($number)) {
    var_dump($number);
}
