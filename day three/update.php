<!DOCTYPE html>
<html>
<head>
    <title>Update Student</title>
</head>
<body>
<h1>Update Student</h1>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch student data from database and display in form
    // Include database connection and Student model files
    require_once 'db.php';
    require_once 'student.php';

    // Create a new Student object
    $student = new Student($pdo);
    $studentData = $student->getStudentById($id);

    if ($studentData) {
        echo '<form action="update.php?id=' . $id . '" method="post">';
        echo '<label for="name">Name:</label>';
        echo '<input type="text" id="name" name="name" value="' . $studentData['name'] . '" required><br>';
        echo '<label for="address">Address:</label>';
        echo '<input type="text" id="address" name="address" value="' . $studentData['address'] . '" required><br>';
        echo '<label for="email">Email:</label>';
        echo '<input type="email" id="email" name="email" value="' . $studentData['email'] . '" required><br>';
        echo '<input type="submit" name="submit" value="Update">';
        echo '</form>';

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $email = $_POST['email'];

            // Update student data in database
            $student->updateStudent($id, $name, $address, $email);
        }
    } else {
        echo 'Student not found';
    }
} else {
    echo 'Invalid request';
}
?>
<a href="index.html">Back</a>
</body>
</html>
