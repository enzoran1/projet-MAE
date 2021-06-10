<?php

abstract class AbstractController
{   
    public CONST VIEW_DIR = BASE_DIR . 'templates/';
    /**
     * index, directement en lien avec le repo template 
     *
     * @return void
     */
    public abstract function index();
    
    /**
     * render
     *
     * @param  mixed $viewFilePath
     * @return void
     */
    public function render(string $viewFilePath, array $data = []) : void
    {
        // On instancie une vue
        $vue = new View(self::VIEW_DIR . $viewFilePath);
        // On affiche la vue
        $vue->render($data);
    }
}