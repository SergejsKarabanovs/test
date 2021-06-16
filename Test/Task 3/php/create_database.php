<?php

require_once("config.php");

Class CreateDatabase {

  public $connection;

  function __construct(){
    $this->open_db_connection();
  }


  public function open_db_connection(){

    $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS);
    if($this->connection->connect_errno){
      die("Database connection failed" . $this->connection->connect_error);
    }
  }

    public function set_database_name($db_name){
      $sql = "CREATE DATABASE IF NOT EXISTS $db_name";
      if ($this->connection->query($sql) === TRUE) {
        // echo "Database created successfully";
      } else {
        echo "Error creating database: " . $this->connection->error;
      }
    }
}

$create = new CreateDatabase();
$create->set_database_name("email_list_collection");

?>
