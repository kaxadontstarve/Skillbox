<?php
echo "<font color=\"red\">Задание 1-3:</font><br>";
$textStorage = [];
function add(string $title, string $text, array &$textStorage)
{
    $textStorage[count($textStorage)]['title'] = $title;
    $textStorage[count($textStorage) - 1]['text'] = $text;
}
add('Greetinig1', 'i want to tell you hello', $textStorage);
add('Greetinig2', 'i want to tell you hi', $textStorage);
add('Greetinig3', 'i want to tell you hi', $textStorage);
add('Greetinig4', 'i want to tell you hi', $textStorage);
add('Greetinig5', 'i want to tell you hi', $textStorage);
add('Greetinig6', 'i want to tell you hi', $textStorage);
var_dump($textStorage);
echo '<br>';

echo "<font color=\"red\">Задание 4-6:</font><br>";
function remove(int $index, array &$textStorage)
{
    if ($index < count($textStorage)) {
        array_splice($textStorage, $index, 1);
        return true;
    } else {
        return false;
    }
}
remove(0, $textStorage);

var_dump($textStorage);
echo '<br>';
var_dump(remove(5, $textStorage));
echo '<br>';

echo "<font color=\"red\">Задание 7-10:</font><br>";
function edit(int $index, string $title, string $text, array &$textStorage)
{
    if ($index < count($textStorage)) {
        $index;
        $textStorage[$index]['title'] = $title;
        $textStorage[$index]['text'] = $text;
        return true;
    } else {
        return false;
    }
}
edit(0, 'Parting', 'Goodbye baby!', $textStorage);
var_dump($textStorage);
echo '<br>';
var_dump(edit(7, 'Parting', 'Goodbye baby!', $textStorage));
