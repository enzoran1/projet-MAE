<?php

class Router
{
    public CONST DEFAUT_CONTROLLER = 'home';
    public CONST DEFAUT_CONTROLLER_ACTION = 'index';

    private  $controller;
    private  $action;
    private $param;

    public function __construct(string $request_uri)
    {
        $request_uri = explode('/', trim($request_uri, '/'));

        $this->controller = !empty($request_uri[0]) ? $request_uri[0] : self::DEFAUT_CONTROLLER;
        $this->action = $request_uri[1] ?? SELF::DEFAUT_CONTROLLER_ACTION;
        $this->param = $request_uri[2] ?? null;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getParam()
    {
        return $this->param;
    }

    public function execute()
    {
        try{
            // Début du MVC
            // 1. On interprête la requête provenant du navigateur dans le but d'instancier le bon controleur
            // Le passage du paramètre "controller" depuis l'URL doit representer le contexte que l'on souhaite afficher
            $controllerClassName = $this->getController();
            
            $controllerClassName = ucfirst(strtolower($controllerClassName)) . 'Controller';
            $controllerFileName = BASE_DIR . 'src/Controllers/' . $controllerClassName . '.php'; // controller à maintenant le même nom que le fichier controller

            if(file_exists($controllerFileName)) // si le fichier existe : 
            {
                include $controllerFileName; 
                $controller = new $controllerClassName(); // $controllerFileName = Nom du controller qu'on souhaite instancier 

                // 2. On appelle la bonne action
                $action = $this->getAction();
                if(method_exists($controller, $action))
                {
                    $controller->$action($this->getParam());
                }
                else
                {
                    throw new Exception("L'action $action du controller $controllerClassName n'existe pas", 404);
                }

            }
            else
            {
                throw new Exception("Le fichier $controllerFileName n'existe pas", 404);
            }
        }catch(Exception $e){
            
            $this->controller = 'error';
            $this->action = 'show';
            $this->param = $e;
            $this->execute();
        }
    }
}