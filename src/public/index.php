<?php

$dbUserName = 'root';
$dbPassword = 'password';
$pdo = new PDO(
    'mysql:host=mysql; dbname=learningmanagement; charset=utf8',
    $dbUserName,
    $dbPassword
);

$sql = 'SELECT * FROM learningnotes';
$statement = $pdo->prepare($sql);
$statement->execute();
$learningnotes = $statement->fetchAll(PDO::FETCH_ASSOC);

$standard_key_array = [];

foreach ($learningnotes as $key => $value) {
    $standard_key_array[$key] = $value['created_at'];
}

array_multisort($standard_key_array, SORT_DESC, $learningnotes);
?>

<body>
    <a href="create.php">まとめを追加</a><br>

  <div>
    <table border="1">
      <tr>
        <th>テーマ</th>
        <th>学習のまとめ</th>
        <th>作成日時</th>
        <th>編集</th>
        <th>削除</th>
      </tr>

      <?php foreach ($learningnotes as $learningnote): ?>
        <tr>
          <td><?php echo $page['title']; ?></td>
          <td><?php echo $page['impressions']; ?></td>
          <!-- 表示変更 -->
          <td><?php echo date('Y年m月d日H時i分s秒', strtotime($page['created_at'])); ?></td>
          <td><a href="edit.php?id=<?php echo $page['id']; ?>">編集</a></td>
          <td><a href="delete.php?id=<?php echo $page['id']; ?>">削除</a></td>
        </tr>
      <?php endforeach; ?>

    </table>
  </div>

</body>