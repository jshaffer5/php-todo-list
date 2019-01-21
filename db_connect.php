<?php
function db(){
    global $link;
    $link = new mysqli("localhost", "root", "root", "todolist");
    if($link->connect_error) {
      echo "failed to connect: ". $link->connect_error();
    }
    return $link;
}

db();
?>

