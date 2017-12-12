<?php

abstract class AbstractModel 
{
    public static $tableName;
    
    public static function getAll()
    {
        $db = DB::getConnection();
        
        $sql = "SELECT * FROM " . static::$tableName;
        $result = $db->query($sql);
        
        if ($result) {
            $result->setFetchMode(PDO::FETCH_OBJ);
            $row = $result->fetchAll();
            
            return $row ?: false;
        }
    }
    
    public static function getOneById($id)
    {
        $db = DB::getConnection();
        
        $sql  = "SELECT * ";
        $sql .= "FROM " . static::$tableName . " ";
        $sql .= "WHERE id = :id ";
        $sql .= "LIMIT 1";
        
        $stmt = $db->prepare($sql);
        $stmt->bindParam('id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row ?: false;
    }
}
