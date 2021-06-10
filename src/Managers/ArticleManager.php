<?php

class ArticleManager extends Manager
{
    public CONST TABLE = 'post';

    public function get($id)
    {
        $query =  $this->executeQuery(
            'SELECT * FROM ' . self::TABLE . ' WHERE id = :id', 
            ['id' => $id]
        );
        return $query->fetch(PDO::FETCH_ASSOC);
    }

}