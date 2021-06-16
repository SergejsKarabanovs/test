<?php

class Email extends Db_object {

  protected static $db_table = "subscribers"; //to make code more reusable
  protected static $db_table_fields = array('email');//to avoid pulling $db_table,$id etc. , we don't need them
  public $id;
  public $email;
  public $date;



  public static function delete_email(){

    if (isset($_POST["checkedProduct"])){

      foreach($_POST["checkedProduct"] as $email_id) {
      $delete = self::find_by_id($email_id);
      $delete->delete();
      echo "<meta http-equiv='refresh' content='0'>";
      }
    }
  }


  public static function createButtons() {

    $emails = self::find_all();

    foreach ($emails as $email_part) {
    $list[] = stristr($email_part->email, '@');
    }

    foreach(array_unique($list) as $val){
    echo '<input type="submit" name="email_index_button[]" value="' .$val. '" id="' .$val. '">';
    }
    return $val;

  }


  public static function show_email_table(){

    if (isset($_POST["email_index_button"])){
      foreach($_POST["email_index_button"] as $email_index) {
      $results = self::find_email_by("email", $email_index);
      }
    }
    elseif (isset($_POST["searchButton"])) {
      $search_val = $_POST['searchInput'];
      $results = self::find_email_by("email", $search_val);
    } else {
      $results = self::find_all();
    }
      return $results;
  }


  public static function find_email_by($where, $like){
    $sql  = "SELECT * FROM " .self::$db_table;
    $sql .= " WHERE ".$where." LIKE " . "'%$like%' ORDER BY `date`";
    $results = self::find_by_query($sql);
    return $results;
  }


} //End of class

 ?>
