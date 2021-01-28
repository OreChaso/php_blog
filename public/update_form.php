<?php

require_once ('blog.php');

$blog = new Blog();
$result = $blog->getById($_GET['id']);

$id = $result['id'];
$title = $result['title'];
$content = $result['content'];
$category = (int)$result['category'];
$publish_status = (int)$result['publish_status'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ブログ</title>
</head>
<body>
  <h2>ブログ編集フォーム</h2>
  <form action="/site02/blog_update.php" method="POST">
  <input type="hidden" name="id" value="<?php echo $id ?>">
    <p>ブログタイトル：</p>
    <input type="text" name="title" value="<?php echo $title ?>">
    <p>ブログ本文：</p>
    <textarea name="content" id="content" cols="30" rows="10"><?php echo $content ?></textarea>
    <br>
    <p>カテゴリー:</p>
    <select name="category" id="">
      <option value="1" <?php if($category === 1) echo "selected" ?>>日常</option>
      <option value="2" <?php if($category === 1) echo "selected" ?>>プログラミング</option>
    </select>
    <br>
    <input type="radio" name="publish_status" value="1" <?php if($category === 1) echo "checked" ?>>公開
    <input type="radio" name="publish_status" value="2" <?php if($category === 1) echo "checked" ?>>非公開
    <br>
    <input type="submit" value="送信">
  </form>
  <p><a href="/site02">戻る</a></p>
  
</body>
</html>