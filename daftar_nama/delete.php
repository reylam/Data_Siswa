<?php

require_once 'connect.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];

    mysqli_query($conn, "DELETE FROM students WHERE id=$id");

    header('Location: index.php');
}