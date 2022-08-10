<?php
require "./task_module-8.php";
require "./task_module-10.php";

abstract class Storage implements LoggerInterface, EventListenerInterface
{
    abstract function create(Text $text);

    abstract function read($id, Text $text);

    abstract function update($id, $slug, Text $text);

    abstract function delete($id, $slug);

    abstract function list();

    public function logMessage($errorMessage)
    {
        error_log(serialize($errorMessage), 3, 'errors.txt');
    }

    public function lastMessages($countMessage)
    {
        return  file_get_contents('errors.txt', false, null, -1, $countMessage);
    }

    public function attachEvent($methodName, $callback)
    {
        set_error_handler([$methodName, $callback]);
    }

    public function detouchEvent($methodName)
    {
    }
}

abstract class View
{
    public $storage;

    abstract function __construct(Storage $storage);

    abstract function displayTextById($id);

    abstract function displayTextByUrl($url);
}

abstract class User implements EventListenerInterface
{
    protected $id;
    protected $name;
    protected $role;

    protected abstract function getTextsToEdit($role);

    function attachEvent($methodName, $callback)
    {
        set_error_handler([$methodName, $callback]);
    }

    public function detouchEvent($methodName)
    {
    }
}

class FileStorage extends Storage
{
    public function create(Text $text)
    {
        $slug = $text->slug;
        $i = 1;
        while (file_exists($slug . '.txt')) {
            $slug = $text->slug . "_" . $i;
            $i++;
        }
        $text->slug = $slug;
        file_put_contents($text->slug . '.txt', serialize([$text]));
        return $slug;
    }

    public function read($id, $text)
    {
        
        if (!file_exists($text->slug . 'txt')) {
            var_dump(unserialize(file_get_contents($text->slug . '.txt', 0)));
        } else {
            echo 'Файла не существует';
        }
    }

    public function update($id, $slug, Text $text)
    {
        if (file_exists($slug)) {
            file_put_contents($slug, serialize($text));
            return 'Файл изменён';
        } else {
            return 'Файла не существует';
        }
    }

    public function delete($id, $slug)
    {
        if (file_exists($slug)) {
            unlink($slug);
            return 'Файл удалён';
        } else {
            return 'Файла не существует';
        }
    }

    public function list()
    {
        $directories = array_diff(scandir('./'), ['..', '.', '.git']);
        foreach ($directories as $file) {
            $list[] = unserialize(file_get_contents($file));
        }
        if ($list) {
            return $list;
        }
        return 'Ничего не найдено';
    }
}
$fileStorage = new FileStorage();
$text = new Text('Kaxa', 'text', $fileStorage);
$text->title = 'It is title';
$text->text = 'It is text';
