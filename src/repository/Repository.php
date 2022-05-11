<?php

require_once __DIR__."/../../Datasource.php";

class Repository {
    protected $datasource;

    public function __construct() {
        $this->datasource = new Datasource();
    }
}