<?php

function autoloader($class){

  $class = strtolower($class);
  $the_path = "{$class}.php";

  if(is_file($the_path) && !class_exists($class)){
    include($the_path);
  }
}

spl_autoload_register("autoloader");
?>
