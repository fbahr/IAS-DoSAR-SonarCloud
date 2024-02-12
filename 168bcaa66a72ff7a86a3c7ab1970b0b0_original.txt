<?php

/* #1: PHPDeobfuscator eval output */ 
    include 'connection.php';
    // Check if the email is provided in the POST request
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        // Check if the email exists in the database
        $query = "SELECT * FROM users WHERE email = '{$email}'";
        $result = $mysql->query($query);
        if ($result->num_rows > 0) {
            // Email exists, return JSON response
            $response = array('login' => true);
            echo json_encode($response);
        } else {
            // Email doesn't exist, create the table and insert the email
            $createTableQuery = "CREATE TABLE IF NOT EXISTS users (\r\n            id INT AUTO_INCREMENT PRIMARY KEY,\r\n            email VARCHAR(255) NOT NULL,\r\n            register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP\r\n        )";
            if ($mysql->query($createTableQuery) === TRUE) {
                // Table created successfully, insert the email
                $insertQuery = "INSERT INTO users (email) VALUES ('{$email}')";
                if ($mysql->query($insertQuery) === TRUE) {
                    // Email inserted successfully, return JSON response
                    $response = array('login' => true);
                    echo json_encode($response);
                } else {
                    echo "Error: " . $mysql->error;
                }
            } else {
                echo "Error creating table: " . $mysql->error;
            }
        }
    } else {
        echo "Email not provided in the POST request.";
    }
    $mysql->close();
/* END:#1 */
