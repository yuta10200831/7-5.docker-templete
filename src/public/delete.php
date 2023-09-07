<?php
$dbUserName = 'root';
$dbPassword = 'password';
$pdo = new PDO(
    'mysql:host=mysql; dbname=learningmanagement; charset=utf8',
    $dbUserName,
    $dbPassword
);

$id = filter_input(INPUT_GET, 'id');
$sql = "DELETE FROM learningnotes where id = $id";
$statement = $pdo->prepare($sql);
$statement->execute();

header('Location: index.php');
exit();
?>
