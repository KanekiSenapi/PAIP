<?php

require_once __DIR__."/../Model.php";

class BorrowMini extends Model
{

    protected $id;
    protected $borrowerId;
    protected $lenderId;
    protected $bookId;
    protected $borrowedOn;
    protected $returnOn;
    protected $returnedOn;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getBorrowerId()
    {
        return $this->borrowerId;
    }

    public function setBorrowerId($borrowerId): void
    {
        $this->borrowerId = $borrowerId;
    }

    public function getLenderId()
    {
        return $this->lenderId;
    }

    public function setLenderId($lenderId): void
    {
        $this->lenderId = $lenderId;
    }

    public function getBookId()
    {
        return $this->bookId;
    }

    public function setBookId($bookId): void
    {
        $this->bookId = $bookId;
    }

    public function getBorrowedOn()
    {
        return $this->borrowedOn;
    }

    public function setBorrowedOn($borrowedOn): void
    {
        $this->borrowedOn = $borrowedOn;
    }

    public function getReturnOn()
    {
        return $this->returnOn;
    }

    public function setReturnOn($returnOn): void
    {
        $this->returnOn = $returnOn;
    }

    public function getReturnedOn()
    {
        return $this->returnedOn;
    }

    public function setReturnedOn($returnedOn): void
    {
        $this->returnedOn = $returnedOn;
    }







}