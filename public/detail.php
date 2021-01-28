<?php

require_once ('blog.php');

$blog = new Blog();
$result = $blog->getById($_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ブログ詳細</title>
</head>
<body>
  <h2>ブログ詳細</h2>
  <h3>タイトル：<?php echo htmlspecialchars($result['title']); ?></h3>
  <p>投稿日時：<?php echo htmlspecialchars($result['post_at']); ?></p>
  <p>カテゴリー：<?php echo htmlspecialchars($blog->setCategoryName($result['category'])); ?></p>
  <hr>
  <p>本文：<br>
  <br>
  <?php echo nl2br(htmlspecialchars($result['content'])); ?></p>
  <p><a href="/site02">戻る</a></p>
</body>
</html>