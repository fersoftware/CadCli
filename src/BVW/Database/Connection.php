<?php

namespace BVW\Database;

class Connection 
{
    /**
     *
     * @var \PDO
     */
    private $conn;
    
    private $dsn;
    private $username;
    private $password;


    public function __construct($config)
    {
        $this->dsn = "{$config['driver']}:host={$config['host']};dbname={$config['dbName']}";
        $this->username = $config['user'];
        $this->password = $config['pass'];
    }
    
    /**
     * Get PDO connection
     * @return \PDO
     */
    public function getConnection()
    {
        if (!$this->conn instanceof \PDO) {
            try {
                $this->conn = new \PDO($this->dsn, $this->username, $this->password);
            } catch (\PDOException $ex) {
                die("Erro de conexão: {$ex->getMessage()}");
            }
        }
        
        return $this->conn;
    }
}
