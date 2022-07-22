<?php

class TelegraphText
{

    public $text;
    public $title;
    public $author;
    public $published;
    public $slug;
    public $storage;
    
    public function __construct($author, $slug)
    {
        $this->author = $author;
        $this->slug = $slug;
        $this->published = date("Y-m-d H:i:s");
    }

    public function storeText()
    {
        $this->storage['text'] = $this->text;
        $this->storage['title'] = $this->title;
        $this->storage['published'] = $this->published;
        $this->storage['slug'] = $this->slug;
        $this->storage['author'] = $this->author;

        file_put_contents($this->storage['slug'], serialize($this->storage));
    }

    public function loadText()
    {
        if (filesize($this->storage['slug'])) {
            $this->storage = unserialize(file_get_contents($this->storage['slug'], 0));
            $this->text = $this->storage['text'];
            $this->title = $this->storage['title'];
            $this->published = $this->storage['published'];
            $this->slug = $this->storage['slug'];
            $this->author = $this->storage['author'];
            return $this->text;
        }
        return 'Файл пуст';
    }

    public function editText($title, $text)
    {
        $this->text = $text;
        $this->title = $title;
    }
}

$textMessage = new TelegraphText('Kaxa', 'text.txt');
$textMessage->editText('It is title', 'It is text');
$textMessage->storeText();
var_dump($textMessage->loadText());
