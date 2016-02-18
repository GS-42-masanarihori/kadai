<?php
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/register.css">
	<title>登録ページ</title>
</head>
<body>
	<div class="register">
		<form action="register_do.php" method="post">
			名前：<input type="text" name="name" size="30" maxlength="20">
			メールアドレス：<input type="text" name="mail" size="30" maxlength="20">
			パスワード：<input type="password" name="pass" size="20" maxlength="20">
			<input type="submit" value="登録する">
		</form>
	</div>
</body>
</html>