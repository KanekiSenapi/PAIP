<?php

class Author implements JsonSerializable
{

    private $id;
    private $fullname;

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


    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}