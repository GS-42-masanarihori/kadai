<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/kadaitop.css">

<title>TOPページ</title>
</head>

<body>

<!-- login_act.php は認証処理用のPHPです。 -->
<div class="logincontents">
	<header>
	  <nav class="navbar">LOGIN</nav>
	</header>

	<form name="form" action="kadai_logincheck.php" method="post" class="idpass">
		<p>ID:<input type="text" name="lid" class="lid"></p><br>
		<p>PW:<input type="password" name="lpw" class="lpw"></p><br>
		
		<div class="login">
			<input type="submit" value="ログインする">
		</div>
	</form>

	<form action="kadaidata_insert.php" method="post" class="register">
		<p>登録をしていない方はこちら↓</p>

		<div class="submit">
			<input type="submit" value="会員登録する">
		</div>
	</form>
</div>

</body>
</html>

