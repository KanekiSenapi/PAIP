<?php

require_once __DIR__."/../service/SessionService.php";
require_once __DIR__."/../service/RoleService.php";
require_once "src/utils/HeaderUtils.php";

class AppController {
    protected SessionService $sessionService;
    protected RoleService $roleService;
    protected array $session;

    private $request;

    private string $APP_TITLE_TAG = "{{APP.TITLE}}";
    private string $APP_TEMPLATE_NAME_TAG = "{{APP.TEMPLATE_NAME}}";
    private string $APP_CONTENT_TAG = "{{APP.CONTENT}}";
    private string $APP_HEADER_TAG = "{{APP.HEADER}}";
    private string $APP_FOOTER_TAG = "{{APP.FOOTER}}";

    public function __construct() {
        session_start();
        $this->session = $_SESSION;
        $this->request = $_SERVER['REQUEST_METHOD'];
        $this->sessionService = new SessionService();
        $this->roleService = new RoleService();
    }

    protected function render(string $template = null, string $title = "", array $variables = [], string $requiredRoles = "") {
        $this->sessionValidity();
        if (!$this->roleValidate($requiredRoles)) {
            HeaderUtils::redirectToHome();
        }

        $content = $this->prepareContent($template, $variables);

        print $this->prepareBasicPage($title, $content, $template);
    }

    private function prepareContent(string $template = null, array $variables = []): string {
        $templatePath = "public/views/" . $template . ".php";

        if (file_exists($templatePath)) {
            extract($variables);

            ob_start();
            include $templatePath;
            $output = ob_get_clean();
        } else {
            $output = "Template didn't exist";
        }

        return $output;
    }

    private function prepareElement(string $template = null, array $variables = []): string {
        $templatePath = "public/elements/" . $template . ".php";
        $output = "";

        if (file_exists($templatePath)) {
            extract($variables);

            ob_start();
            include $templatePath;
            $output = ob_get_clean();
        }

        return $output;
    }

    private function prepareBasicPage($title, $content, $templateName): string {
        $basic = $this->prepareContent("basic");
        $header = $this->prepareElement("header", ["current" => $templateName]);
        $footer = $this->prepareElement("footer");

        $basic = str_replace($this->APP_TITLE_TAG, $title, $basic);
        $basic = str_replace($this->APP_TEMPLATE_NAME_TAG, $templateName, $basic);
        $basic = str_replace($this->APP_CONTENT_TAG, $content, $basic);

        $basic = str_replace($this->APP_HEADER_TAG, $header, $basic);
        $basic = str_replace($this->APP_FOOTER_TAG, $footer, $basic);

        return $basic;
    }

    protected function isGet(): bool {
        return $this->request === 'GET';
    }

    protected function isPost(): bool {
        return $this->request === 'POST';
    }

    private function sessionValidity() {
        if($_SESSION["created"]) {
            $uid = $_SESSION["uid"];
            $sid = $_SESSION["sid"];
            if(!$this->sessionService->isSessionValid($sid, $uid)) {
                session_unset();
            } else {
                $this->sessionService->updateSessionTimeLife($sid, $uid);
            }
        }
    }

    protected function roleValidate(string $requiredRole = ""):bool {
        if (empty($requiredRole)) {
            return true;
        } else {
            if($_SESSION["created"]) {
                $uid = $_SESSION["uid"];
                $roles = $this->roleService->getRolesForUid($uid);
                return in_array($requiredRole, $roles);
            } else {
                return false;
            }
        }
    }
}