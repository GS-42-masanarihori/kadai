<?php 
require('dbconnect.php');

$sql = sprintf('INSERT INTO my_items SET maker_id=%d, item_name="%s",price=%d,keyword="%s"',
		mysqli_real_escape_string($db, $_POST['maker_id']),
		mysqli_real_escape_string($db, $_POST['item_name']),
		mysqli_real_escape_string($db, $_POST['price']),
		mysqli_real_escape_string($db, $_POST['keyword'])

	);
	mysqli_query($db,$sql) or die(mysqli_error($db));
?>


<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>登録完了</title>
</head>
<body>
<div class="complete">
	<p>商品を登録しました。</p>
	<p><a href="index.php">一覧に戻る</a></p>
</div>
</body>
</html>