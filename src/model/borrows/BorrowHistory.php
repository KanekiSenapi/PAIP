<?php

require_once __DIR__."/../Model.php";

class BorrowHistory extends Model
{

    protected $id;
    protected $borrowerName;
    protected $borrowedon;
    protected $returned;

    public function getId()
    {
        return $this->id;
    }

    public function getBorrowerName()
    {
        return $this->borrowerName;
    }

    public function getBorrowedon()
    {
        return $this->borrowedon;
    }

    public function getReturned()
    {
        return $this->returned;
    }



}