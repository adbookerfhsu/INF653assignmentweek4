<?php
require_once('database.php');

// Get Item Number
$itemNum = filter_input(INPUT_POST, 'ItemNum', FILTER_VALIDATE_INT);

// delete items

if($itemNum != false) {
$query = 'DELETE FROM todoitems
              WHERE ItemNum = :ItemNum';
    $statement = $db->prepare($query);
    $statement->bindValue(':ItemNum', $itemNum);
    $success = $statement->execute();
    $statement->closeCursor();
}

    //Return to ToDoList
    include('index.php');

