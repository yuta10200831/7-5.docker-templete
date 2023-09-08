<?php
session_start();

$dbUserName = 'root';
$dbPassword = 'password';
$pdo = new PDO(
    'mysql:host=mysql; dbname=learningmanagement; charset=utf8',
    $dbUserName,
    $dbPassword
);

$theme = $_POST['theme'] ?? '';
$contents = $_POST['contents'] ?? '';

// タイトルと感想の入力チェック
if ($theme === '' || $contents === '') {
    echo 'タイトルまたは学習のまとめが入力されていません。<br>';
    echo '<a href="index.php">トップページへ戻る</a>';
    exit;
}

// データをDBに保存
$sql = 'INSERT INTO learningnotes (theme, contents, created_at) VALUES (:theme, :contents, NOW())';
$statement = $pdo->prepare($sql);
$statement->bindValue(':theme', $theme);
$statement->bindValue(':contents', $contents);
$statement->execute();

// 保存が完了したら、index.phpにリダイレクト
header('Location: index.php');
exit;
