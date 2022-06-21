<?php

require_once "Model.php";

class Role extends Model {

    protected string $name;

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }



}