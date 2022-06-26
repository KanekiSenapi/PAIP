<?php

require_once __DIR__."/../Model.php";

class BorrowLight extends Model
{

    protected $id;
    protected $borrowerName;
    protected $bookId;
    protected $bookTitle;
    protected $bookAuthors;
    protected $returned;
    protected $expired;

    public function getId()
    {
        return $this->id;
    }

    public function getBorrowerName()
    {
        return $this->borrowerName;
    }

    public function getBookId()
    {
        return $this->bookId;
    }

    public function getBookTitle()
    {
        return $this->bookTitle;
    }

    public function getBookAuthors()
    {
        return $this->bookAuthors;
    }

    public function getReturned()
    {
        return $this->returned;
    }

    public function getExpired()
    {
        return $this->expired;
    }


}