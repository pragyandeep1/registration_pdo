<?php
session_start();
require_once 'db/conn.php';

if (isset($_POST['delete_student_btn'])) {
    $student_id = $_POST['delete_student_btn'];
    $query = "DELETE FROM students WHERE id = :stud_id";
    $stmt = $pdo->prepare($query);
    $data = [':stud_id' => $student_id];
    $execute = $stmt->execute($data);

    if ($execute) {
        $_SESSION['success'] = "Student deleted successfully!";
    } else {
        $_SESSION['error'] = "Failed to delete student!";
    }

    header('Location: index.php');
    exit();
}

if (isset($_POST['update_student_btn'])) {
    $student_id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    try {
        $query = "UPDATE students SET fullname = :fullname, email = :email, phone = :phone, course = :course WHERE id = :stud_id";
        $stmt = $pdo->prepare($query);
        $data = [
            ':fullname' => $fullname,
            ':email' => $email,
            ':phone' => $phone,
            ':course' => $course,
            ':stud_id' => $student_id
        ];
        $execute = $stmt->execute($data);

        if ($execute) {
            $_SESSION['success'] = "Student updated successfully!";
        } else {
            $_SESSION['error'] = "Failed to update student!";
        }

        header('Location: index.php');
        exit();
    } catch (PDOException $e) {
        $_SESSION['error'] = "Database error: " . $e->getMessage();
        header('Location: index.php');
        exit();
    }
}

if(isset($_POST['save_student_btn'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];
    $query = "INSERT INTO students (fullname, email, phone, course) VALUES (:fullname, :email, :phone, :course)";
    $stmt = $pdo->prepare($query);
    $data = [
        ':fullname' => $fullname,
        ':email' => $email,
        ':phone' => $phone,
        ':course' => $course
    ];
    $query_execute = $stmt->execute($data);
    if($query_execute) {
        $_SESSION['success'] = "Student added successfully!";
        header('Location: index.php');
        exit(0);
    } else {
        $_SESSION['error'] = "Failed to add student!";
        header('Location: index.php');
        exit(0);
    }
} else {
    $_SESSION['error'] = "Invalid request!";
    header('Location: index.php');
    exit(0);
}