<?php

class BookMini
{

    private $id;
    private $metadataId;

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