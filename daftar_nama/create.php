<?php
require 'connect.php';
require_once './validations/student-validation.php';

$errors = [];

$data = [
    'name' => $_POST ['name'] ?? '',
    'email' => $_POST ['email'] ?? '',
    'address' => $_POST ['address'] ?? '',
];


function store($name, $email, $address){
    global $conn;

    mysqli_query($conn, "INSERT INTO students VALUES(null,'$name', '$email', '$address')");

    header('Location: index.php');
}

function handleRequest(){
    global $errors;

    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $address = $_POST['address'] ?? '';

    $validated = validate($name,$email);

    if ($validated['error'] === true){
        $errors = $validated['message'];
        return;
    }

    store($name,$email,$address);
}

if ($_SERVER['REQUEST_METHOD'] === "POST"){
    handleRequest();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Create</title>
    <style>
        *{
            padding
        }
        textarea {
        resize: none;
        }
    </style>
</head>

<body>
    <h1>TAMBAH SISWA</h1>

    <?php include('./partials/alert-student.php');?>
    <?php include('./partials/form-student.php'); ?>
</body>
</html>