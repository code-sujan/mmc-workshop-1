<!DOCTYPE html>
<html>
<head>
    <title>Delete Student</title>
</head>
<body>
<h1>Delete Student</h1>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete student data from database
    // Include database connection and Student model files
    require_once 'db.php';
    require_once 'student.php';

    // Create a new Student object
    $student = new Student($pdo);
    $studentData = $student->getStudentById($id);

    if ($studentData) {
        echo 'Are you sure you want to delete the following student?<br>';
        echo 'ID: ' . $studentData['id'] . '<br>';
        echo 'Name: ' . $studentData['name'] . '<br>';
        echo 'Address: ' . $studentData['address'] . '<br>';
        echo 'Email: ' . $studentData['email'] . '<br>';
        echo '<form action="delete.php?id=' . $id . '" method="post">';
        echo '<input type="submit" name="submit" value="Yes">';
        echo '</form>';

        if (isset($_POST['submit'])) {
            // Delete student data from database
            $student->deleteStudent($id);
        }
    } else {
        echo 'Student not found';
    }
} else {
    echo 'Invalid request';
}
?>
