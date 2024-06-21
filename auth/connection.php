<?php

class Database {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'nakrebi';
    private $connection;

    public function construct(){
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        if($this->connection->connect_error){
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function query($query){
        $result = $this->connection->query($query);
        if(!$result) {
            die("Query failed: " . $this->connection->error);
        }
        return $result;
    }

    public function escapeString($string){
        return $this->connection->real_escape_string($string);
    }

    public function destruct(){
        $this->connection->close();
    }
}
?>