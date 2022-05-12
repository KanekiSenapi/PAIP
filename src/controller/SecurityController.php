<?php

require_once "AppController.php";
require_once __DIR__."/../repository/UserRepository.php";
require_once __DIR__."/../repository/RoleRepository.php";
require_once __DIR__."/../model/User.php";

class SecurityController extends AppController {

    private $userRepository;
    private $roleRepository;

    public function __construct(){
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->roleRepository = new RoleRepository();
    }

    public function login() {
        if (!$this->isPost()) {
            $this->render('login');
            return;
        }

        $email = $_POST['email'];
        $password = self::encryptPassword($_POST['password']);
        $user = $this->userRepository->getUserByEmail($email);

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

    public function register() {
        if (!$this->isPost()) {
            $this->render('register');
            return;
        }

        $email = $_POST['email'];
        $password = self::encryptPassword($_POST['password']);
        $password2 = self::encryptPassword($_POST['password2']);
        $name = $_POST['name'];
        $surname = $_POST['surname'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->render('register', "Register", ['messages' => ['Email is not valid!']]);
        } else if ($password != $password2) {
            $this->render('register', "Register", ['messages' => ['Password must be the same!']]);
        } else if ($this->userRepository->existUserByEmail($email)) {
            $this->render('register', "Register", ['messages' => ['Email already exist in database!']]);
        } else if (!isset($name) || !isset($surname)) {
            $this->render('register', "Register", ['messages' => ['Fill all fields with values!']]);
        } else {
            $user = new User($email, $password, $name, $surname);

            $inserted = $this->userRepository->insertUser($user);

            if ($inserted) {
                $this->render('register', "Register", ['messages' => ['Successfully registered! You can log in now.']]);
            } else {
                $this->render('register', "Register", ['messages' => ['Something went wrong. Try again!']]);
            }
        }
    }

    public function roles() {
        if (!$this->isPost()) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/home");
            return;
        }

        $roles = $this->roleRepository->getRolesByUserId("1");

        print_r($roles);
    }


    private function encryptPassword(string $password) : string {
        return password_hash($password, PASSWORD_DEFAULT, ["salt" => "paip123456789paip0paip123456789paip"]);
    }
}