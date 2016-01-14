<?php
require('dbconnect.php');

$sql = sprintf("DELETE FROM my_items WHERE id=%d",
		mysqli_real_escape_string($db,$_REQUEST['id'])
	);
	mysqli_query($db,$sql) or die(mysqli_error($db));

?>



<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>削除完了</title>
</head>
<body>
<div class="complete">
	<p>商品の情報を削除しました</p>
	<p><a href="index.php">一覧に戻る</a></p>
</div>
</body>
</html>