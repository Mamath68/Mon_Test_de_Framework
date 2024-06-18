<?php
// core/Controller.php

namespace Core;

class Controller
{
    protected function render($view, $data = [])
    {
        extract($data);

        // Capture the content of the view
        ob_start();
        include __DIR__ . "/../app/views/$view.phtml";
        $content = ob_get_clean();

        // Include the base layout
        include __DIR__ . '/../app/views/layouts/base.phtml';
    }
}
