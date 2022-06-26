<?php

require_once __DIR__."/../Model.php";

class BookMini extends Model
{

    protected $id;
    protected $metadataId;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getMetadataId()
    {
        return $this->metadataId;
    }

    public function setMetadataId($metadataId): void
    {
        $this->metadataId = $metadataId;
    }




}