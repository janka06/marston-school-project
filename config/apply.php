<?php
session_start();
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from session and POST request
    $student_id = $_SESSION["user"];
    $subject = $_SESSION["subject"];
    $teacher = $_SESSION["teacher"];
    $pd = $_POST["pd_name"];
    $stunda = $_POST["stunda"];
    // Removed the date field as it is automatically timestamped by the database

    // Debugging: Print received data
    echo "Student ID: $student_id<br>";
    echo "Subject: $subject<br>";
    echo "Teacher: $teacher<br>";
    echo "PD: $pd<br>";
    echo "Stunda: $stunda<br>";

    // Prepare the SQL statement to insert data into the laimiga table
    $sql = "INSERT INTO laimiga (Student_Id, subject, teacher, pd, stunda) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $student_id, $subject, $teacher, $pd, $stunda);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        echo "Application successfully submitted!";
    } else {
        echo "Error submitting application: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
