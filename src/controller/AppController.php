<?php

class AppController {
    private $request;

    private string $APP_TITLE_TAG = "{{APP.TITLE}}";
    private string $APP_CONTENT_TAG = "{{APP.CONTENT}}";
    private string $APP_HEADER_TAG = "{{APP.HEADER}}";
    private string $APP_FOOTER_TAG = "{{APP.FOOTER}}";

    protected function render(string $template = null, string $title = "", array $variables = []) {
        $content = $this->prepareContent($template, $variables);

        print $this->prepareBasicPage($title, $content, $template);
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

    private function prepareElement(string $template = null, array $variables = []): string {
        $templatePath = "public/elements/" . $template . ".html";
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
        $basic = str_replace($this->APP_CONTENT_TAG, $content, $basic);

        $basic = str_replace($this->APP_HEADER_TAG, $header, $basic);
        $basic = str_replace($this->APP_FOOTER_TAG, $footer, $basic);

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