<?php

require_once "AppController.php";
require_once __DIR__."/../repository/UserRepository.php";
require_once __DIR__."/../model/User.php";

class SecurityController extends AppController {

    public function login() {
        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            $this->render('login');
            return;
        }

        $email = $_POST['email'];
        $password = self::encryptPassword($_POST['password']);
        $user = $userRepository->getUser($email);

        if (!$user) {
            $this->render('login', "Login", ['messages' => ['User not found!']]);
        } else if ($user->getEmail() !== $email) {
            $this->render('login', "Login", ['messages' => ['User with this email not exist!']]);
        } else if ($user->getPassword() !== $password) {
            $this->render('login', "Login", ['messages' => ['Wrong password!']]);
        } else {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/home");
        }
    }

    private function encryptPassword(string $password) : string {
        return password_hash($password, PASSWORD_DEFAULT, ["salt" => "paip123456789paip0paip123456789paip"]);
    }
}