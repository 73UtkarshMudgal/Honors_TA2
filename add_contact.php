<?php
require 'includes/functions.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the contact details from the form
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $country_code = $_POST['country_code'] ?? '';
    $phone = $_POST['phone'] ?? '';

    // Combine country code and phone number
    $full_phone = $country_code . $phone;

    // Check if the contact already exists
    if (contactExists($name, $email, $full_phone)) {
        $error = "A contact with the same name, email, and phone number already exists.";
    } else {
        // Insert the new contact into the database
        if (insertContact($name, $email, $full_phone)) {
            header('Location: index.php'); // Redirect to the contact list
            exit;
        } else {
            // Handle the error (e.g., display a message)
            $error = "There was an error adding the contact.";
        }
    }
}

// Include the view for adding a contact
include 'views/add_contact.view.php';

// Function to check if contact already exists
function contactExists($name, $email, $phone) {
    $pdo = connectToDatabase();
    $query = "SELECT COUNT(*) FROM contacts WHERE name = :name AND email = :email AND phone = :phone";
    $statement = $pdo->prepare($query);
    $statement->execute([':name' => $name, ':email' => $email, ':phone' => $phone]);

    return $statement->fetchColumn() > 0; // Returns true if at least one contact exists
}
