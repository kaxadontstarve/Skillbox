<?php
require "./task_module-8.php";

abstract class Storage
{
    abstract function create(Text $data);

    abstract function read($id, $slug);

    abstract function update($id, $slug, Text $data);

    abstract function delete($id, $slug);

    abstract function list();
}

abstract class View
{
    public $storage;

    abstract function __construct(Storage $storage);

    abstract function displayTextById($id);

    abstract function displayTextByUrl($url);
}

abstract class User
{
    public $id;
    public $name;
    public $role;

    abstract function getTextsToEdit($role);
}


class FileStorage extends Storage
{
    public $data;
    public $slug;

    function create(Text $data)
    {
        for ($i = 1; $i < 99; $i++) {
            if (file_exists($data->slug)) {
                $this->slug = $data->slug . "_$i";
                
            } else {
                $this->data = $this->slug . $data->published;
                file_put_contents($this->slug, serialize($this->data));
                return $this->slug;
            }
        }
    }

    function read($id, $slug)
    {
        if (file_exists($slug)) {
            return unserialize(file_get_contents($slug));
        } else {
            return 'Файла не существует';
        }

    }

    function update($id, $slug, Text $data)
    {
        if (file_exists($slug)) {
            file_put_contents($slug, serialize($data));
            return 'Файл изменён';
        } else {
            return 'Файла не существует';
        }
        
    }

    function delete($id, $slug)
    {
        if (file_exists($slug)) {
            unlink($slug);
            return 'Файл удалён';
        } else {
            return 'Файла не существует';
        }
    }

    function list()
    {
        $directories = array_diff(scandir('D:\desctor\Folders\Studing\Kurs\module-9'), ['..', '.', '.git']);
        foreach ($directories as $file) {
            $list[] = unserialize(file_get_contents($file));
        }
        if ($list) {
            return $list;
        } 
        return 'Ничего не найдено';

    }
}
$fileSafe = new FileStorage();
$textMessage = new Text('Kaxa', 'text.txt', $fileSafe);
$textMessage->editText('It is title', 'It is text');
$textMessage->storeText();
var_dump($textMessage->loadText());