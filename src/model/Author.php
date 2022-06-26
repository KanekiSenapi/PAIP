<?php

require_once __DIR__."/Model.php";

class Author extends Model
{

    protected $id;
    protected $fullname;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getFullname()
    {
        return $this->fullname;
    }

    public function setFullname($fullname): void
    {
        $this->fullname = $fullname;
    }
}