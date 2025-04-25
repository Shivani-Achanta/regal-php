<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "intern";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the question ID from the AJAX request
$questionId = $_POST['question_id'];

// Prepare and execute the SQL statement to update the status
$sql = "UPDATE questions_list SET status = 'solved' WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $questionId);

if ($stmt->execute()) {
  echo "Status updated successfully";
} else {
  echo "Error updating status: " . $conn->error;
}

// Close the connection
$conn->close();
?>
