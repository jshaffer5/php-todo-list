<?php
require_once("db_connect.php");
db();
global $link;
$id = $_GET["id"];
$sql = "DELETE FROM todo WHERE id = $id";
$result = $link->query($sql);