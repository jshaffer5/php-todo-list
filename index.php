<html>
    <head>
        <title>my todos</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <h2>
        Next on my agenda
        </h2>
        <p><a href="create.php">add todo</a></p>
        <h1>Current List</h1>
        
        <?php 
        require_once("db_connect.php");
        $sql = "SELECT id, todoTitle, todoDescription FROM todo";
        global $link;
        if($link->connect_error) {
            echo "failed to connect: ". $link->connect_error();
          }
        $result = $link->query($sql);
        echo var_dump($result); 
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                //echo $row["id"]. " ". $row["todoTitle"]. " - ". $row["todoDescription"]. "<br>";
                $id = $row["id"];
                $title = $row["todoTitle"];
                $description= $row["todoDescription"];
                $date = $row["date"];
                echo $title . " - ";
                echo "<a href=\"detail.php?id=$id\">" . $description . "</a><br>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </body>
</html>