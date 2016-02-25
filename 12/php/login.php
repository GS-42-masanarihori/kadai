<?php
var name = "ほり";

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>ログインページ</title>
	<link rel="stylesheet" href="../css/login.css">
</head>
<body>
	<div class="login_text">
		<h2>ログイン情報入力</h2>
		<p>登録したメールアドレス、パスワードを入力してください。</p>
	</div>
	<div class="login">
		<div class="user_photo"></div>
		<div class="user_data">
			<form action="../editarea.html" method="post">
				<input type="text" name="mail" size="30" maxlength="20" placeholder="EMAIL-ADDRESS"><br>
				<input type="password" name="pass" size="30" maxlength="20" placeholder="PASSWORD"><br>
				<input type="submit" value="ログインする" class="login_btn">
			</form>
		</div>
	</div>	
</body>
</html>