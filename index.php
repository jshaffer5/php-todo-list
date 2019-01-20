<html>
    <head>
        <title>my todos</title>
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
        $result = $link->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo $row["id"]. " ". $row["todoTitle"]. " - ". $row["todoDescription"]. "<br>";
                $id = $row["id"];
                $title = $row["todoTitle"];
                $description= $row["todoDescription"];
                $date = $row["date"];
            }
        } else {
            echo "0 results";
        }  echo var_dump($id);
        ?>

        <ul>
            <li>
                <a href="detail.php?id=<?php echo $id?>"><?php echo $title?></a>
            </li><?php echo "[[ ".$date." ]]";?>
        </ul>
    </body>
</html>