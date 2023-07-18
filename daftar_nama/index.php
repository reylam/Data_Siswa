<?php
require('connect.php');

$result = mysqli_query($conn,'SELECT * FROM students');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Data Siswa</h1>
    <p>
        <a href="create.php">Tambah Data</a>
    </p>
    <table border="2">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($student = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $student['name'];?></td>
                <td><?= $student['email'];?></td>
                <td><?= $student['address'];?></td>
                <td>
                    <a href="edit.php?id=<?= $student['id'];?>">Edit</a>
                    <form action="delete.php" method="POST">
                        <input type="hidden" name="id" value="<?= $student['id'];?> ">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endwhile;?>
        </tbody>
    </table>
</body>
</html>