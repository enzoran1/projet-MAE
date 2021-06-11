<?php

class Autoloader
{
    public static array $list = array();
    
    /**
     * load
     *
     * @param  mixed $className
     * @return void
     */
    public static function load($className)
    {
        self::$list[] = $className; 
               
        if(file_exists(BASE_DIR . 'app/' . $className . '.php'))
            require BASE_DIR . 'app/' . $className . '.php';

        if(file_exists(BASE_DIR . 'src/Controllers/' . $className . '.php'))
            require BASE_DIR . 'src/Controllers/' . $className . '.php';
        
        if(file_exists(BASE_DIR . 'src/Managers/' . $className . '.php'))
            require BASE_DIR . 'src/Managers/' . $className . '.php';
        
        if(file_exists(BASE_DIR . 'src/Entities/' . $className . '.php'))
            require BASE_DIR . 'src/Entities/' . $className . '.php';
    }
    
    /**
     * register
     *
     * @return void
     */
    public static function register()
    {
        spl_autoload_register([__CLASS__,'load']);
    }

}

Autoloader::register();
