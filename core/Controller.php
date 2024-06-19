<?php
namespace Core;

class Controller
{
    protected function render($view, $data = [])
    {
        extract($data);
        ob_start(); //démarre un buffer (tampon de sortie)
        /*la vue s'insère dans le buffer qui devra être vidé au milieu du layout*/
        include VIEW_DIR . "$view.phtml";
        /*je mets cet affichage dans une variable*/
        $content = ob_get_contents();
        /*j'efface le tampon*/
        ob_end_clean();
        /*j'affiche le template principal (layout)*/
        include VIEW_DIR . "layouts/base.phtml";
    }
}