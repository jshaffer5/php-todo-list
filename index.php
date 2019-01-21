<html>
    <head>
        <title>my todos</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <h1>Current List</h1>
        
        <?php 
        require_once("db_connect.php");
        $sql = "SELECT id, todoTitle, todoDescription, date FROM todo";
        global $link;
        if($link->connect_error) {
            echo "failed to connect: ". $link->connect_error();
          }
        $result = $link->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $title = $row["todoTitle"];
                $description= $row["todoDescription"];
                $date = $row["date"];
                echo $title . " - ";
                echo "<a href=\"detail.php?id=$id\">" . $description . " </a><br>";
            }
        } else {
            echo "0 results";
        }
        ?>
        <button ><a href="create.php">Add Item</a></button>
    </body>
</html>