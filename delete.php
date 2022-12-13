<?php
include './components/header.php';


// Get the ID of the item to be deleted from the form data
$id = $_POST['id'];

// Delete the item with the specified ID
$sql = "DELETE FROM portfolio_image WHERE id = $id";

// Execute the query
$query = $conn->query($sql);

// Check if the query was successful
if (!$query) {
    die("Error executing query: " . mysqli_error($conn));
}


include './components/footer.php';

header('Location: /photography-portfolio/portfolio');
exit;
?>