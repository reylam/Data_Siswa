<?php

require_once 'connect.php';
require_once './validations/student-validation.php';

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
$student =mysqli_fetch_assoc($result);

$data= [
    'name' => $_POST ['name'] ?? $student['name'],
    'email' => $_POST ['email'] ?? $student['email'],
    'address' => $_POST ['address'] ?? $student['address'],
];

$errors = [];

function update(){
    global $data, $errors, $conn, $id  ;

    $validated = validate($data['name'],$data['email']);

    if ($validated['error'] === true){
        $errors = $validated['message'];
        return;
    }

    $name = $data['name'];
    $email = $data['email'];
    $address = $data['address'];

    mysqli_query($conn, "UPDATE students SET name='$name', email='$email', address='$address' WHERE id=$id");

    header('Location: index.php');
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    update();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit student</title>
</head>
<body>
    <h1>Edit Student <?= $id; ?></h1>

    <?php include('./partials/alert-student.php');?>
    <?php include('./partials/form-student.php'); ?>
</body>
</html>