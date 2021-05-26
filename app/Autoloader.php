<?php
class Autoloader {

    static function loading($className)
    {

        // CES CONDITIONS FONT REFERENCES A TOUT NOS REPERTOIRES SUSCEPTIBLES D'ACCEUILLIR DES CLASSES
        if(file_exists(BASE_DIR . 'Views/'.$className.'.php'))
            require BASE_DIR . 'Views/'.$className.'.php';

        if(file_exists(BASE_DIR . 'Controllers/'.$className.'.php'))
            require BASE_DIR . 'Controllers/'.$className.'.php';

        if(file_exists(BASE_DIR . 'Models/'.$className.'.php'))
            require BASE_DIR . 'Models/'.$className.'.php';
    }


    // PERMET D'APPELER LA FONCTION LOADING CI DESSUS DES LORS QUE L'ON FAIT APPEL A UNE CLASSE QUE CE SOIT POUR INSTANCIER UN OBJET OU FAIRE APPEL A SES METHODES STATIQUES
    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'loading'));
    }

}