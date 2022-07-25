<?php
require "./task_module-8.php";
require "./task_module-10.php";

abstract class Storage implements LoggerInterface, EventListenerInterface
{
    abstract function create(Text $Text);

    abstract function read($id, $slug);

    abstract function update($id, $slug, Text $Text);

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
    public $Text;
    public $slug;

    public function create(Text $Text)
    {
        $i = 1;
        while (file_exists($Text->storage['slug'])) {
            $this->slug = $Text->storage['slug'] . "_" . $i;
            $i++;
        }
        $Text->storage['slug'] = $this->slug;
        var_dump($Text->storage['slug']);
        //file_put_contents($this->slug, serialize($Text->storage));
        return $this->slug;
    }

    public function read($id, $slug)
    {
        if (file_exists($slug)) {
            return unserialize(file_get_contents($slug));
        } else {
            return 'Файла не существует';
        }
    }

    public function update($id, $slug, Text $Text)
    {
        if (file_exists($slug)) {
            file_put_contents($slug, serialize($Text));
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
$Text = new Text('Kaxa', 'text.txt', $fileStorage);
$Text->title = 'It is title';
$Text->text = 'It is text';