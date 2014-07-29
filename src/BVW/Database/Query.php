<?php
namespace BVW\Database;

use BVW\Database\Connection;

class Query 
{
    /**
     * @var \PDO
     */
    private $conn;
    
    public function __construct(Connection $connection)
    {
        $this->conn = $connection->getConnection();
    }
    
    public function returnQuery($sql, array $params, $fetchAll = false)
    {
        $stmt = $this->conn->prepare($sql);
        if (!$stmt->execute($params)) {
            print_r($sql);
            die(print_r($stmt->errorInfo()));
        }
        
        return $fetchAll ? $stmt->fetchAll(\PDO::FETCH_ASSOC) : $stmt->fetch(\PDO::FETCH_ASSOC);        
    }
    
    public function noReturnQuery($sql, array $params)
    {
        $stmt = $this->conn->prepare($sql);
        if (!$stmt->execute($params)) {
            print_r($sql);
            die(print_r($stmt->errorInfo()));
        }
        
        return true;
    }
}
