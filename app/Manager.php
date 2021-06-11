<?php


abstract class Manager
{
    private CONST DB_HOST = 'localhost';
    private CONST DB_NAME = 'projetifa';
    private CONST DB_USERNAME = 'root';
    private CONST DB_PWD = '';

    protected $pdoInstance;

    protected function setPdoInstance()
    {
        $this->pdoInstance = new PDO(
            'mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME,
            self::DB_USERNAME,
            self::DB_PWD
        );
    }

    protected function getPdoInstance()
    {
        return $this->pdoInstance;
    }
    
    /**
     * executeQuery
     *
     * @param  mixed $sql
     * @param  mixed $params
     * 
     */
    protected function executeQuery(string $sql, array $params = NULL)
    {
        $this->setPdoInstance();
        if(empty($params))
        {
            $query = $this->getPdoInstance()->query($sql);
        }
        else
        {
            $query = $this->getPdoInstance()->prepare($sql);
            $query->execute($params);
        }
        return $query;
    }
    
    /**
     * getAll
     *
     * @param  mixed $tableName
     * 
     */
    public function getAll(string $tableName)
    {
        $query = $this->executeQuery('SELECT * FROM ' . $tableName);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }


}