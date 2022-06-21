<?php

class HeaderUtils
{
    public static function redirectToHome() {
        self::redirectTo("home");
    }

    public static function redirectTo($location) {
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/{$location}");
    }
}