<?php
require 'includes/functions.php';

// Check if the contact ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute the delete query
    $pdo = connectToDatabase();
    $query = "DELETE FROM contacts WHERE id = :id";
    $statement = $pdo->prepare($query);
    $statement->execute([':id' => $id]);

    // Redirect back to the contact list
    header('Location: index.php');
    exit;
} else {
    // If no ID is provided, show an error
    $error = "No contact ID provided.";
    include 'views/delete_contact.view.php';
}
