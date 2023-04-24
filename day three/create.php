<!DOCTYPE html>
<html>
<head>
    <title>Create Student</title>
</head>
<body>
<h1>Create Student</h1>
<form action="create.php" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>
    <label for="address">Address:</label>
    <input type="text" id="address" name="address" required><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>
    <input type="submit" name="submit" value="Submit">
</form>
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];

    require_once 'db.php';
    require_once 'student.php';

    $student = new Student($pdo);
    $student->createStudent($name, $address, $email);
    header('index.php');
}
?>
</body>
</html>
