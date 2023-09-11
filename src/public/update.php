<?php

$dbUserName = 'root';
$dbPassword = 'password';
$pdo = new PDO(
    'mysql:host=mysql; dbname=learningmanagement; charset=utf8',
    $dbUserName,
    $dbPassword
);

$id = filter_input(INPUT_POST, 'id');
$theme = filter_input(INPUT_POST, 'theme');
$contents = filter_input(INPUT_POST, 'contents');

if (!empty($theme) && !empty($contents)) {
    $sql = 'UPDATE learningnotes SET theme=:theme, contents=:contents WHERE id = :id';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->bindValue(':theme', $theme, PDO::PARAM_STR);
    $statement->bindValue(':contents', $contents, PDO::PARAM_STR);
    $statement->execute();

    header('Location: index.php');
    exit();
}
$error = 'タイトルまたは本文が入力されていません';
?>

<body>
  <div>
    <p><?php echo $error . "\n"; ?></p>
    <a href="index.php">
        <p>トップページへ</p>
    </a>
  </div>
</body>
