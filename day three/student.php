<?php
class Student
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function redirect($newUrl){
        header('Location: '.$newUrl.'.php');
    }

    public function createStudent($name, $address, $email)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO student (name, address, email) VALUES (?, ?, ?)");
            $stmt->execute([$name, $address, $email]);
            echo 'Student created successfully<br>';
            $this->redirect('index');
        } catch (PDOException $e) {
            echo 'Failed to create student: ' . $e->getMessage();
        }
    }

    public function readStudents()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM student");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Failed to fetch students: ' . $e->getMessage();
        }
    }

    public function getStudentById($id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM student WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Failed to fetch student: ' . $e->getMessage();
        }
    }

    public function updateStudent($id, $name, $address, $email)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE student SET name = ?, address = ?, email = ? WHERE id = ?");
            $stmt->execute([$name, $address, $email, $id]);
            echo 'Student updated successfully<br>';
        } catch (PDOException $e) {
            echo 'Failed to update student: ' . $e->getMessage();
        }
    }

    public function deleteStudent($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM student WHERE id = ?");
            $stmt->execute([$id]);
            echo 'Student deleted successfully<br>';
        } catch (PDOException $e) {
            echo 'Failed to delete student: ' . $e->getMessage();
        }
    }
}
?>
