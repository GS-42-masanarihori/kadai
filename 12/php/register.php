<?php
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/register.css">
	<title>登録ページ</title>
</head>
<body>
	<div class="register_text">
		<h3>ログイン情報登録</h3>
		<p>ログイン情報の登録は簡単。</p>
		<p>お名前、メールアドレス、パスワードを記入するだけです。</p>
	</div>

	<div class="register">
		<form action="register_do.php" method="post">
			<input type="text" name="name" size="30" maxlength="20" placeholder="NAME"><br>
			<input type="text" name="mail" size="30" maxlength="20" placeholder="EMAIL-ADDRESS"><br>
			<input type="password" name="pass" size="30" maxlength="20" placeholder="PASSWORD"><br>

			<input type="submit" value="登録する" class="register_btn">
		</form>
	</div>
</body>
</html>