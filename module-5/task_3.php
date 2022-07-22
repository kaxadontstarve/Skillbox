<?php
echo "<font color=\"red\">Задание 1-6:</font><br>";
$startDeposit = 100000;
$presentDeposit = 100000;
$procent = 8;
$i = 1;

do {
    $presentDeposit += ($presentDeposit * $procent) / 100;
    echo "<font color=\"blue\">Year ::</font> $i<br>";
    echo "Deposit = $presentDeposit<br>";

    if ($i % 3 == 0) {
        $procent += 2;
    }
    $i++;
} while ($presentDeposit < $startDeposit * 2);

echo "<font color=\"#87BDFF\" size=\"32\">Final Deposit = $presentDeposit<br>";


