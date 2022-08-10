<?php

class Text
{

    public $text;
    public $title;
    public $author;
    public $published;
    public $slug;
    public $storage;
    public $fileStorage;

    public function __construct($author, $slug, FileStorage $fileStorage)
    {
        $this->author = $author;
        $this->slug = $slug;
        $this->published = date("Y-m-d H:i:s");
        $this->fileStorage = $fileStorage;
    }

    public function storeText()
    {
        $storage['text'] = $this->text;
        $storage['title'] = $this->title;
        $storage['published'] = date("Y-m-d H:i:s");
        $storage['slug'] = $this->slug;
        $storage['author'] = $this->author;

        file_put_contents($this->slug, serialize($storage));
    }

    public function loadText()
    {
        return $this->fileStorage->read('', $this->slug);
    }

    public function editText($title, $text)
    {
        $this->text = $text;
        $this->title = $title;
    }
}
