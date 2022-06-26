<?php

class BookFull
{

    private $id;
    private $isbn;
    private $title;
    private $authors;
    private $description;
    private $type;
    private $publisher;
    private $publishedYear;
    private $pagesNumber;


    public function getIsbn()
    {
        return $this->isbn;
    }

    public function setIsbn($isbn): void
    {
        $this->isbn = $isbn;
    }

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


    public function getDescription()
    {
        return $this->description;
    }


    public function setDescription($description): void
    {
        $this->description = $description;
    }


    public function getType()
    {
        return $this->type;
    }


    public function setType($type): void
    {
        $this->type = $type;
    }


    public function getPublisher()
    {
        return $this->publisher;
    }


    public function setPublisher($publisher): void
    {
        $this->publisher = $publisher;
    }


    public function getPublishedYear()
    {
        return $this->publishedYear;
    }


    public function setPublishedYear($publishedYear): void
    {
        $this->publishedYear = $publishedYear;
    }


    public function getPagesNumber()
    {
        return $this->pagesNumber;
    }

    public function setPagesNumber($pagesNumber): void
    {
        $this->pagesNumber = $pagesNumber;
    }


}