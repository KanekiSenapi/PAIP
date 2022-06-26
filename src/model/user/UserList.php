<?php

require_once __DIR__."/../Model.php";

class UserList extends Model
{

    protected $id;
    protected $fullname;

    public function getId()
    {
        return $this->id;
    }

    public function getFullname()
    {
        return $this->fullname;
    }



}