<?php

namespace GameSystem;

class View {
    private $data = array();

    public function setData($key, $value) {
        $this->data[$key] = $value;
    }

    public function setDataFromArray($array = array()) {
        foreach ($array as $key => $value) {
            $this->setData($key, $value);
        }
    }

    public function render($template) {
        $file = APP_DIR . 'view/' . $template;

        if (file_exists($file)) {
            extract($this->data);

            ob_start();

            require($file);

            $output = ob_get_contents();

            ob_end_clean();

            return $output;
        } else {
            trigger_error('Error: Could not load template ' . $file . '!');
            exit();
        }
    }

}