<?php

class BookLight {

    private $id;
    private $title;
    private $authors;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getAuthors()
    {
        return $this->authors;
    }

    public function setAuthors($authors): void
    {
        $this->authors = $authors;
    }

}
