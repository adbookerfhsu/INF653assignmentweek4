<?php
require('database.php');
$query = 'SELECT *
          FROM todoitems
          ORDER BY ItemNum';
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
    <link rel="stylesheet" type="text/css" href="amy.css">
</head>

<!-- the body section -->
<body>
    <header><h1>Amy's To Do List<br>INF 653 Assignment Week 4</h1></header>

    <main>
        <h1>Add Item</h1>
        <form action="additem.php" method="post"
              id="add_item_form">

            <label>Title:</label>
            <input type="text" name="Title"><br>

            <label>Description:</label>
            <input type="text" name="Description"><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Item"><br>
        </form>
        <p><a href="index.php">View To Do List</a></p>
    </main>

    <footer>
    <p>&copy; Amy Booker FHSU INF 653 SPRING 2020</p>
    </footer>
</body>
</html>