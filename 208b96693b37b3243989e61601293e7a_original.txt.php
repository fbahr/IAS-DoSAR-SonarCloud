<?php

/* #1: PHPDeobfuscator eval output */ 
    session_start();
    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../signinAR.php");
        exit;
    }
    // Database Configuration
    $dbHost = 'localhost';
    $dbUsername = 'u608374782_test';
    $dbPassword = 'Aa123123123@@';
    $dbName = 'u608374782_test';
    // Create a database connection
    $connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    // Check if the connection is successful
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    $userId = $_SESSION['user_id'];
    // Fetch user data from the database including the "status" column
    $sql = "SELECT id, username, email, wallet_balance, status FROM users WHERE id = '{$userId}'";
    $result = $connection->query($sql);
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $status = $row['status'];
        if ($status === 'blocked') {
            // Redirect the blocked user to a blocked page or display a message
            header("Location: blocked_page.php");
            exit;
        }
        // Fetch page titles
        $userId = $_SESSION['user_id'];
        $sql = "SELECT title FROM page_titles";
        $titlesResult = $connection->query($sql);
        $titles = [];
        // Initialize an empty array to store titles
        if ($titlesResult->num_rows > 0) {
            while ($row = $titlesResult->fetch_assoc()) {
                $titles[] = $row['title'];
            }
        }
        // Fetch the user's wallet balance from the database
        $userId = $_SESSION['user_id'];
        $sql = "SELECT wallet_balance FROM users WHERE id = '{$userId}'";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $walletBalance = $row['wallet_balance'];
        } else {
            $walletBalance = 0;
        }
        // Check if the delete button is clicked
        if (isset($_POST['delete_key'])) {
            // Get the key ID from the form
            $keyId = $_POST['key_id'];
            // Perform the delete action (you can add more validation if needed)
            $sql = "DELETE FROM get_key WHERE ID = '{$keyId}'";
            if ($connection->query($sql) === TRUE) {
                // Key deletion successful
                header("Location: ../ResellerAR/my_keys.php");
                exit;
            } else {
                echo "Error deleting key: " . $connection->error;
            }
        }
        // Fetch the user's profile photo path from the database
        $userId = $_SESSION['user_id'];
        $sql = "SELECT profile_photo FROM users WHERE id = '{$userId}'";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['profile_photo'] = $row['profile_photo'];
            // Update the session variable
        }
    } else {
        // User not found, handle accordingly
        header("Location: ../signinAR.php");
        exit;
    }
    // Close the database connection
    $connection->close();
/* END:#1 */
