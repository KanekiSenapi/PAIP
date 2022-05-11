<?php

class AppController {
    private $request;

    private string $APP_TITLE_TAG = "{{APP.TITLE}}";
    private string $APP_CONTENT_TAG = "{{APP.CONTENT}}";

    protected function render(string $template = null, string $title = "", array $variables = []) {
        $content = $this->prepareContent($template, $variables);

        print $this->prepareBasicPage($title, $content);

    }

    private function prepareContent(string $template = null, array $variables = []): string {
        $templatePath = "public/views/" . $template . ".html";

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


    private function prepareBasicPage($title, $content): string {
        $basic = $this->prepareContent("basic");

        $basic = str_replace($this->APP_TITLE_TAG, $title, $basic);
        $basic = str_replace($this->APP_CONTENT_TAG, $content, $basic);

        return $basic;
    }

    public function __construct() {
        $this->request = $_SERVER['REQUEST_METHOD'];
    }

    protected function isGet(): bool {
        return $this->request === 'GET';
    }

    protected function isPost(): bool {
        return $this->request === 'POST';
    }
}