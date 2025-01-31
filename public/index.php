<?php

require_once ('blog.php');
ini_set('display_errors', "On");
$blog = new Blog();
$blogData = $blog->getAll();
function h($s) {
  return htmlspecialchars($s, ENT_QUOTES, "utf-8");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ブログ一覧</title>
</head>
<body>
  <h2>ブログ一覧</h2>
  <p><a href="/site02/form.html">新規作成</a></p>
  <table>
    <tr>
      <th>タイトル</th>
      <th>カテゴリー</th>
      <th>投稿日時</th>
    </tr>
    <?php foreach($blogData as $column) : ?>
    <tr>
      <td><?php echo h($column['title']); ?></td>
      <td><?php echo h($blog->setCategoryName($column['category'])); ?></td>
      <td><?php echo h($column['post_at']); ?></td>
      <td><a href="/site02/detail.php?id=<?php echo $column['id'] ?>">詳細</a></td>
      <td><a href="/site02/update_form.php?id=<?php echo $column['id'] ?>">編集</a></td>
      <td><a href="/site02/blog_delete.php?id=<?php echo $column['id'] ?>">削除</a></td>
    </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>