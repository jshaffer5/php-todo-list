<html>
    <head>
        <title>my todos</title>
        <link rel="stylesheet" href="styles.css">
        <script>
        function removeItem(id){
            // console.log(get);
            element = document.getElementById(id);
            nextElement = element.nextElementSibling;
            previousElement = element.previousElementSibling;
            //hide the title, description and "Remove" button
            element.style.display = "none";
            nextElement.style.display = "none";
            previousElement.style.display = "none";

        }
        </script>
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
                echo "<a>$title - </a>";
                echo "<a id=\"$id\" href=\"detail.php?id=$id\">" . $description . " </a><button id=\"id\" value=\"$id\" onclick=\"removeItem(this.value)\">Remove</button><br>";
            }
        } else {
            echo "0 results";
        }
        ?>
        <button ><a href="create.php">Add Item</a></button>
    </body>
</html>