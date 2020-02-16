<?php
// Get the user input
$title = filter_input(INPUT_POST, 'Title');
$description = filter_input(INPUT_POST, 'Description');

// Validate inputs
if ($title == null || $description == null) {
    $error = "Invalid data. Fields can not be empty. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Add items to list  
    $query = 'INSERT INTO todoitems
                 (Title, Description)
              VALUES
                 ( :Title, :Description)';
    $statement = $db->prepare($query);
    $statement->bindValue(':Title', $title);
    $statement->bindValue(':Description', $description);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('index.php');
}
?>