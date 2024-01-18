<?php
 class Database {
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'todo_list';

    public function conecta_mysql(){
        $con =  mysqli_connect($this->host, $this->user, $this->password, $this->database);
        return  $con;
    }


 }
?>