<?php
// process_form.php
include "crud.php";

$crud = new crud();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") { // Or "GET" if you used GET method

    // Get the form data (sanitize these inputs!)
    $username = htmlspecialchars($_POST["inputUsername"]);  // Sanitize name
    $password = htmlspecialchars($_POST["inputPassword"]); // Sanitize email

    // Basic validation (example)
    if (empty($username)) {
        echo "Userame is required. <br>";
        // You might want to stop further processing here if validation fails
        exit; // Stop the script
    }

    $result = $crud->insertUser($username, $password);

    if ($result) {
        header("Location: index.php");
    }

    exit();
} else {
    echo "Form not submitted."; // Handle cases where the script is accessed directly
}