<?php

class Text
{
    public $data;
    public $text;
    public $title;
    public $author;
    public $published;
    public $slug;
    public $storage;
    
    public function __construct($author, $slug, FileStorage $data)
    {
        $this->author = $author;
        $this->slug = $slug;
        $this->published = date("Y-m-d H:i:s");
        $this->data = $data;
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
        return $this->data->read('', $this->slug);
    }

    public function editText($title, $text)
    {
        $this->text = $text;
        $this->title = $title;
    }
}



