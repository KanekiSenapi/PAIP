<?php

require_once __DIR__."/../Model.php";

class BorrowFull extends Model
{

    protected $id;
    protected $borrowerName;
    protected $lenderName;
    protected $bookId;
    protected $bookTitle;
    protected $bookAuthors;
    protected $borrowedon;
    protected $returnon;
    protected $returnedon;

    public function getId()
    {
        return $this->id;
    }

    public function getBorrowerName()
    {
        return $this->borrowerName;
    }

    public function getLenderName()
    {
        return $this->lenderName;
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

    public function getBorrowedOn()
    {
        return $this->borrowedon;
    }

    public function getReturnOn()
    {
        return $this->returnon;
    }

    public function getReturnedOn()
    {
        return $this->returnedon;
    }

}