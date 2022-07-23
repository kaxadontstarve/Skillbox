<?php
$searchRoot = ['rootDirectory' => 'D:/desctor/Folders/Studing/Kurs/HW 7.5', 'fileName' => 'test.txt'];
$searchResult = [];

function searchFile($directory, $fileName, &$searchResult, &$result)
{
    $searchResult = array_diff(scandir($directory), ['..', '.', '.git']);
    echo '<br>';
    echo 'Ищем в :' . $directory . '<br>';
    echo 'Вмистимое папки :';
    var_dump($searchResult);
    echo '<br>';

    foreach ($searchResult as $key => $element) {

        echo '<br>Проверяем элемент :' . $element ;

        if (!is_dir($directory . '/' . $element) && $element == $fileName && filesize($directory . '/' . $element) === 0) {
            echo '<br>Файл найден в ' . $directory . '<br>';

            $result[] = $directory;
            var_dump($result);
        } else if (!is_dir($directory . '/' . $element) && $element == $fileName && filesize($directory . '/' . $element) > 0) {
            echo '<br>Файл найден , но он не пуст , поиск продолжается<br>';
        }
    }
    echo '<br>Проверка файла в этой папки закончена<br>---------------<br>---------------<br>';
    echo 'Поиск следущей папки<br>';
    foreach ($searchResult as $key => $element) {
        if (is_dir($directory . '/' . $element)) {
            echo 'Найдена. Заходим в папку===>' . $directory . '/' . $element . '<br>';
            searchFile($directory . '/' . $element, $fileName, $searchResult, $result);
        } elseif (!is_dir($directory . '/' . $element)) {
            echo "<br>'$element' это не директория<br>";
        }
    }
    return $result;
}
$resultFinal = array_filter(searchFile($searchRoot['rootDirectory'], $searchRoot['fileName'], $searchResult, $result));
if ($resultFinal) {
    echo '<br>Файл найден в :<br>';
    var_dump($resultFinal);
} else {
    echo '<br>Поиск не дал результатов<br>';
}
