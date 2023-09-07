<?php
session_start();

?>

<body>
    <!-- エラーメッセージの表示 -->
    <?php if (isset($_SESSION['error'])): ?>
        <p style="color: red;"><?php echo $_SESSION['error']; ?></p>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <h2>学習のまとめを登録</h2>

    <form method="post" action="store.php">

        <div>
            <label for="title">タイトル
                <input type="text" name="theme" placeholder="タイトル">
            </label>
        </div>

        <div>
            <label for="contents">学習のまとめ
                <textarea name="contents"></textarea>
            </label>
        </div>

        <button type="submit">登録</button>

    </form>
</body>
