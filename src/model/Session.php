<?php

class Session {

    private $validTo;
    private bool $active;

    public function __construct($validTo, bool $active) {
        $this->validTo = $validTo;
        $this->active = $active;
    }

    public function getValidTo() {
        return $this->validTo;
    }

    public function isActive(): bool {
        return $this->active;
    }

}