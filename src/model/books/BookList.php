<?php

require_once __DIR__."/../Model.php";

class BookList extends Model
{

    protected $id;
    protected $name;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }


}