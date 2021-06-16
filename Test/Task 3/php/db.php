<?php

require_once("config.php");

class Database {

  public $connection;

  function __construct(){
    $this->open_db_connection();
    // echo "You are connected!!";
  }


  public function open_db_connection(){

    $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if($this->connection->connect_errno){
      die("Database connection failed" . $this->connection->connect_error);
    }
  }


  public function query($sql) {

    $result = $this->connection->query($sql);
    $this->confirm_query($result);
    return $result;
  }


  public function confirm_query($result) {
    if(!$result){
      die("Query failed" . $this->connection->error);
    }
  }

  //Escape special characters in strings
  public function escape_string($string){
    $escaped_string = $this->connection->real_escape_string($string);
    return $escaped_string;
  }


  public function the_insert_id() {
    return mysqli_insert_id($this->connection); //Return the id from the last query
  }


  public function create_table($table_name){
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
      `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
      `email` text NOT NULL,
      `date` timestamp DEFAULT CURRENT_TIMESTAMP
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
    return $this->connection->query($sql);
  }

} //End of class

# MySQL with PDO_MYSQL
$db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);

$query = file_get_contents("php/subscribers.sql");
$stmt = $db->prepare($query);

if ($stmt->execute()){
     // echo "Success";
} else {
     echo "Failed to upload SQL file";
}


$database = new Database();
$database->create_table("subscribers"); //in case of sql file uploading error


 ?>
