<?php

class AppController {

    protected function render(string $template = null, array $variables = []) {
        $templatePath = "public/views/" . $template . ".html";

        if (file_exists($templatePath)) {
            extract($variables);

            ob_start();
            include $templatePath;
            $output = ob_get_clean();
        } else {
            $output = "Template didn't exist";
        }

        print $output;
    }
}