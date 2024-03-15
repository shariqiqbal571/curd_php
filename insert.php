<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    if (!empty($_POST['name']) && !empty($_POST['class'])) {
        include_once "connection.php";

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $class = mysqli_real_escape_string($conn, $_POST['class']);

        $sql = "INSERT INTO student (name, class) VALUES ('$name', '$class')";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['success_message'] = "Records inserted successfully.";
        } else {
            $_SESSION['error_message'] = "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
       
        $_SESSION['error_message'] = "Name and class cannot be empty.";
    }

    header("Location: index.php");
    exit;
}
?>
