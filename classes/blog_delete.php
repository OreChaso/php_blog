<?php

require_once ('blog.php');

$blog = new Blog();
$result = $blog->delete($_GET['id']);

?>

<p><a href="/site02">戻る</a></p>