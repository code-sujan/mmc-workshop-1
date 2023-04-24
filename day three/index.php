<!DOCTYPE html>
<html>
<head>
    <title>Read Student</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body class="container-fluid mt-1">
<div class="card">
    <div class="card-header">
        <span class="card-title">Student List</span>
    </div>
    <div class="card-body">
        <div>
            <a href="create.php" class="btn btn-primary float-end">Add</a>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php
            // Fetch all students from database and display in table
            // Include database connection and Student model files
            require_once 'db.php';
            require_once 'student.php';

            // Create a new Student object
            $student = new Student($pdo);
            $students = $student->readStudents();

            foreach ($students as $row) {
               ?>
                <tr>
                    <td><?= $row["id"];?></td>
                    <td><?= $row["name"];?></td>
                    <td><?= $row["address"];?></td>
                    <td><?= $row["email"];?></td>
                    <td>
                        <a href="update.php?id=<?=$row["id"]?>" class="btn btn-info">Update</a>
                        <a href="delete.php?id=<?=$row["id"]?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>
