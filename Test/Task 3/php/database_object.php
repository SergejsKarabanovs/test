<?php

//Super flexible/reusable class

class Db_object {


  public static function find_all(){

    return static::find_by_query("SELECT * FROM " .static::$db_table);
  }


  public static function find_by_id($id){
    global $database;

    $the_result_array = static::find_by_query("SELECT * FROM " .static::$db_table. " WHERE id=$id LIMIT 1");

    return !empty($the_result_array) ? array_shift($the_result_array) : false; //array_shift() function removes the first element from an array, and returns the value of the removed element.
  }


  public static function find_by_query($sql){
    global $database;

    $result_set = $database->query($sql);
    $the_object_array = array();

    while ($row = mysqli_fetch_array($result_set)) {
      $the_object_array[] = static::instantation($row);
    }
    return $the_object_array;
  }


  public static function instantation($the_record){ //$the_record is selected info array from database

    $calling_class = get_called_class();
    $the_object = new $calling_class;

    foreach ($the_record as $the_atribute => $value) {
      if($the_object->has_the_atribute($the_atribute)){
        $the_object->$the_atribute = $value;
      }
    }
    return $the_object;
  }


  private function has_the_atribute($the_atribute){

    $object_properties = get_object_vars($this); //  return all the properties of this class

    return array_key_exists($the_atribute, $object_properties);
  }

  public function properties() {
    $properties = array();
    foreach (static::$db_table_fields as $db_field) {
      //check if property exist
      if(property_exists($this, $db_field)){ //$this - to refer to the class.
        $properties[$db_field] = $this->$db_field;
      }
    }
    return $properties; //array with values and keys
  }

  public function clean_properties(){
    global $database;

    $clean_properties = array();

    foreach ($this->properties() as $key => $value) {
      $clean_properties[$key] = $database->escape_string($value);
    }
    return $clean_properties;
  }


  public function save(){

    return isset($this->id) ? $this->update() : $this->create();
  }


  public function create(){
    $properties = $this->clean_properties(); //variable will hold all class properies
    global $database;

    $sql = "INSERT INTO " .static::$db_table. "(" . implode(",", array_keys($properties)) . ")";
    $sql .= "VALUES ('". implode("','", array_values($properties)) ."')";

    if($database->query($sql)){

      $this->id = $database->the_insert_id(); //Return the id from the last query
      return true;

    } else {
      return false;
    }
  }


  public function update(){
    global $database;

    $properties = $this->clean_properties(); //variable will hold all class properies
    $properties_pairs = array();

    foreach ($properties as $key => $value) {
      $properties_pairs[] = "{$key}='$value'"; //"email= '" . $database->escape_string($this->email)
    }

    $sql = "UPDATE " .static::$db_table. " SET ";
    $sql .= implode(", ", $properties_pairs);
    $sql .= " WHERE id = " . $database->escape_string($this->id);

    $database->query($sql);

    //to check if fields where modified
    return (mysqli_affected_rows($database->connection)) == 1 ? true : false; //to check if fields where modified
  }


  public function delete(){
    global $database;

    $sql = "DELETE FROM " .static::$db_table. " ";
    $sql .= "WHERE id = " . $database->escape_string($this->id);
    $sql .= " LIMIT 1";

    $database->query($sql);

    return (mysqli_affected_rows($database->connection)) == 1 ? true : false;
  }


  public static function count_all(){
    global $database;

    $sql = "SELECT COUNT(*) FROM " . static::$db_table;
    $result_set = $database->query($sql);
    $row = mysqli_fetch_array($result_set);

    return array_shift($row);
  }


}

 ?>
