<?php
class db
{
    private $dbHost = 'localhost';
    private $dbUser = 'petpal';
    private $dbPass = 'W11d1618';
    private $dbName = 'petpal';
    private $port = '3306';
    //conección 
    public function conectDB()
    {
        try {
            $mysqlConnect = "mysql:host=$this->dbHost;dbname=$this->dbName;port=$this->port";
            $dbConnecion = new PDO($mysqlConnect, $this->dbUser, $this->dbPass);
            $dbConnecion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbConnecion;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}


//   $mysqli = new mysqli("localhost", "petpal", "W11d1618", "petpal", "3307");
//  if ($mysqli->connect_errno) {
//      printf("Falló la conexión: %s\n", $mysqli->connect_error);
//      exit();
//  } else {
//     $mysqli->set_charset('utf8');
//      return $mysqli;
//  }