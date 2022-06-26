<?php

require_once "AppController.php";

class DefaultController extends AppController {

    public function home() {
        $this->render("home", "Home");
    }

    public function about() {
        $this->render("about", "about");
    }

}