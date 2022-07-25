<?php
class Text
{
    public $fileStorage;
    private $text;
    private $title;
    private $author;
    private $published;
    private $slug;

    public function __construct($author, $slug, FileStorage $fileStorage)
    {
        $this->author = $author;
        $this->slug = $slug;
        $this->published = date("d-m-Y H:i:s");
        $this->fileStorage = $fileStorage;
    }

    public function __set($string, $value)
    {
        if ($string == 'author') {
            if (mb_strlen($value) > 120) {
                echo "Имя автора не должно привышать 120 символов";
                return false;
            } else {
                $this->author = $value;
            }
        } elseif ($string == 'slug') {
            if (!preg_match('/[a-zA-Z —_\/]/', $value)) {
                echo "Имя файла должно содержать символы латинского алфавита,—_/";
                return false;
            } else {
                $this->slug = $value;
            }
        } elseif ($string == 'published') {
            if ($value < date("d-m-Y H:i:s")) {
                echo 'Дата неверная';
                return false;
            } else {
                $this->published = $value;
            }
        } elseif ($string == 'title') {
            $this->title = $value;
        } elseif ($string == 'text') {
            $this->text = $value;
            $this->storeText();
        }
    }

    public function __get($string)
    {
        if ($string == 'author') {
            return $this->author;
        } elseif ($string == 'slug') {
            return $this->slug;
        } elseif ($string == 'published') {
            return $this->published;
        } elseif ($string == 'title') {
            return $this->title;
        } elseif ($string == 'text') {
            $this->loadText();
            return $this->text;
        }
    }

    private function storeText()
    {
        $this->fileStorage->create($this);
    }

    private function loadText()
    {
        var_dump($this->fileStorage->read('', $this->slug));
    }
}
