<?php

session_start(); // Start the session to access session variables

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "intern";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the question ID, user ID, and current question index from the AJAX request
$questionId = $_POST['question_id'];
$userId = $_POST['user_id'];

// Begin transaction
$conn->begin_transaction();

try {
    // Retrieve the current Logical JSON for the user
    $sql = "SELECT Logical FROM tbl_users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);

    if (!$stmt->execute()) {
        throw new Exception("Error retrieving user data: " . $conn->error);
    }

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $questionsSolved = json_decode($row['Logical'], true);

    // Ensure $questionsSolved is an array
    if (!is_array($questionsSolved)) {
        $questionsSolved = [];
    }

    // Add the new question ID to the array if it's not already present
    if (!in_array($questionId, $questionsSolved)) {
        $questionsSolved[] = $questionId;
    }

    // Encode the array back to JSON
    $questionsSolvedJson = json_encode($questionsSolved);

    // Update the tbl_users table with the new JSON and current question index
    $sql = "UPDATE tbl_users SET Logical = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $questionsSolvedJson, $userId);

    if (!$stmt->execute()) {
        throw new Exception("Error updating user data: " . $conn->error);
    }

    // Commit the transaction
    $conn->commit();

    echo json_encode(['status' => 'success', 'message' => 'Logical updated successfully.']);
} catch (Exception $e) {
    // Rollback the transaction in case of error
    $conn->rollback();
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
} finally {
    $stmt->close();
    $conn->close();
}
