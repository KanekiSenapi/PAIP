<?php

class BookLight extends Model {

    protected $id;
    protected $title;
    protected $authors;

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAuthors()
    {
        return $this->authors;
    }


}
