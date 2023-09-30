<?php
session_start();
include('dbcon.php');

if (isset($_POST['submit'])) {
    $title = $_POST['title'];


    $query = "INSERT INTO todo_list (title) VALUES (:title)";
    $query_run = $conn->prepare($query);

    $data = [
        ':title' => $title,
    ];
    $query_execute = $query_run->execute($data);

    if ($query_execute) {
        $_SESSION['message'] = "Inserted Successfully";
        header('Location: student-add.php');
        exit(0);
    } else {
        $_SESSION['message'] = "Not Inserted";
        header('Location: student-add.php');
        exit(0);
    }
}
