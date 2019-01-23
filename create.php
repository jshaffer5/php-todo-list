<html>
    <head>
    <title>Create Todo list</title>
    <link rel="stylesheet" href="styles.css">
    </head>
<body>
    <h1>Create Todo List</h1>
    <form method="post" action="create.php">
        <p>Todo title: </p>
        <input name="todoTitle" type="text">
            <p>Todo description: </p>
        <input name="todoDescription" type="text">
        <br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>

<?php
require_once("db_connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$title = $_POST["todoTitle"];
$description = $_POST["todoDescription"];
echo "you filled title " . $title . "<br> and description " . $description . "<br>";

//connect to database
db();
global $link;
$sql = "INSERT INTO todo(todoTitle, todoDescription, date) VALUES ('$title', '$description', now())";
if ($link->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}
$link->close();
}
?>
<br>
<button><a href="index.php">Full List</a></button>

