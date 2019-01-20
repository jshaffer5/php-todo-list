<?php
function db(){
    global $link;
    $link = new mysqli("localhost", "root", "root", "todolist");
    if($link->connect_error) {
      echo "failed to cennect: ". $link->connect_error();
    }
    return $link;
}
if(db()){
  echo "db connected SUCCESSFULLY<br>". "<br>";
} 
// $sql = "SELECT id, title, text FROM news";
// $result = $link->query($sql);

// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo "id: " . $row["id"]. " - title: " . $row["title"]. " - text: ". $row["text"]. "<br>";
//     }
// } else {
//     echo "0 results";
// }  

?>

