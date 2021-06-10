<?php

class View
{
    public  $filename;
    
    /**
     * __construct
     *
     * @param  mixed $filename
     * @return void
     */
    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }
    
    /**
     * render
     *
     * @param  mixed $data
     * @return void
     */
    public function render(array $data)
    {
        // On démarre la tamporisation
        ob_start();

        // On extrait les clefs du tableau $data sous forme de variables
        extract($data);

        // On inclue le fichier de la vue (qui sera executer dans le tampon)
        require $this->filename;

        // On recupère le contenu du tampon dans une variable et on le vide
        $body = ob_get_clean();

        // On inclue la layout globale
        require BASE_DIR . 'templates/base.php';
    }
}