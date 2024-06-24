<?php

namespace App\Services;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigService
{
    private $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../../views');
        $this->twig = new Environment($loader, [
            'cache' => __DIR__ . '/../cache',
            'debug' => true,
        ]);

        // Handle deprecated warnings by adjusting error reporting
        error_reporting(E_ALL & ~E_DEPRECATED);
    }

    public function render($template, $data = [])
    {
        try {
            // Automatically append .html.twig if not already present
            if (!str_ends_with($template, '.html.twig')) {
                $template .= '.html.twig';
            }
            echo $this->twig->render($template, $data);
        } catch (\Exception $e) {
            echo "Erreur lors du rendu de la vue : " . $e->getMessage();
        }
    }
}
