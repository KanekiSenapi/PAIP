<?php

require_once "AppController.php";
require_once __DIR__."/../repository/UserRepository.php";
require_once __DIR__."/../model/security/User.php";

class SecurityController extends AppController {

    private UserRepository $userRepository;

    public function __construct(){
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login() {
        if (!$this->isPost()) {
            $this->render("login", "Login");
            return;
        }

        $email = $_POST["email"];
        $password = self::encryptPassword($_POST["password"]);
        $user = $this->userRepository->getUserByEmail($email);

        if (!$user) {
            $this->render("login", "Login", ["messages" => ["User not found!"]]);
        } else if ($user->getEmail() !== $email) {
            $this->render("login", "Login", ["messages" => ["User with this email not exist!"]]);
        } else if ($user->getPassword() !== $password) {
            $this->render("login", "Login", ["messages" => ["Wrong password!"]]);
        } else if ($this->prepareSession($user)) {
            HeaderUtils::redirectToHome();
        } else {
            $this->render("login", "Login", ["messages" => ["Something went wrong! Try again."]]);
        }
    }

    public function logout() {
        if (!$this->isGet()) {
            HeaderUtils::redirectToHome();
            return;
        }

        $sid = session_id();
        $this->sessionService->deactivateSessionForSid($sid);
        session_destroy();
        HeaderUtils::redirectToHome();
    }

    public function register() {
        if (!$this->isPost()) {
            $this->render("register");
            return;
        }

        $email = $_POST["email"];
        $password = self::encryptPassword($_POST["password"]);
        $password2 = self::encryptPassword($_POST["password2"]);
        $name = $_POST["name"];
        $surname = $_POST["surname"];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->render("register", "Register", ["messages" => ["Email is not valid!"]]);
        } else if ($password != $password2) {
            $this->render("register", "Register", ["messages" => ["Password must be the same!"]]);
        } else if ($this->userRepository->existUserByEmail($email)) {
            $this->render("register", "Register", ["messages" => ["Email already exist in database!"]]);
        } else if (!isset($name) || !isset($surname)) {
            $this->render("register", "Register", ["messages" => ["Fill all fields with values!"]]);
        } else {
            $user = new User($email, $password, $name, $surname);

            $inserted = $this->userRepository->insertUser($user);

            if ($inserted) {
                $this->render("login", "Login", ["messages" => ["Successfully registered! You can log in now."]]);
            } else {
                $this->render("register", "Register", ["messages" => ["Something went wrong. Try again!"]]);
            }
        }
    }

    public function sessionValidity() {
        if ($_SESSION) {
            $sid = $_SESSION["sid"];
            $uid = $_SESSION["uid"];
            $valid = $this->sessionService->isSessionValid($sid, $uid);
            $logged = true;
        } else {
            $valid = false;
            $logged = false;
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(["valid" => $valid, "logged" => $logged]);
    }

    public function prepareSession(User $user): bool {
        $this->sessionService->deactivateSessionForUid($user->getId());
        session_regenerate_id(true);
        $sid = session_id();
        $createdSession = $this->sessionService->createSession($sid, $user->getId());


        if ($createdSession) {
            $_SESSION['created'] = true;
            $_SESSION['sid'] = $sid;
            $_SESSION['uid'] = $user->getId();
            $_SESSION['roles'] = $this->roleService->getRolesForUid($user->getId());
            return true;
        } else {
            return false;
        }
    }

    private function encryptPassword(string $password) : string {
        return password_hash($password, PASSWORD_DEFAULT, ["salt" => "paip123456789paip0paip123456789paip"]);
    }
}