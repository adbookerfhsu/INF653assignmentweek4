<?php

require_once('database.php');

// Get Title from list
$query = 'SELECT * 
          FROM todoitems';
$statement = $db->prepare($query);
$statement->execute();
$items = $statement->fetchAll();
$statement->closeCursor();



?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>INF 653 Assignment Week 4</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="amy.css" />
</head>

<!-- the body section -->
<body>
<header><h1>Amy's To Do List<br>INF 653 Assignment Week 4</h1></header>
<main>
    <h1>The List</h1>
    <table>
            <tr>
                <th>Number</th>
                <th>Title</th>
                <th>Description</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($items as $item) : ?>
            <tr>
                <td><?php echo $item['ItemNum']; ?></td>
                <td><?php echo $item['Title']; ?></td>
                <td><?php echo $item['Description']; ?></td>
                <td><form action="deleteitem.php" method="post">
                    <input type="hidden" name="ItemNum"
                           value="<?php echo $item['ItemNum']; ?>"> 
                    <input type="hidden" name="Title"
                           value="<?php echo $item['Title']; ?>">
                    <input type="hidden" name="Description"
                           value="<?php echo $item['Description']; ?>">       
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        
        </table>
            </br>
            <?php 
                if ($items == null) {
                    echo  "No to do list items exist yet.";
                }
    ?>
        <p><a href="additemform.php">Click here to add new item</a></p>
    </div>
</main>
<footer>
    <p>&copy; Amy Booker FHSU INF 653 SPRING 2020</p>
</footer>
</body>
</html>