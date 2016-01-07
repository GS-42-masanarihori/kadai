<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>TOPページ</title>
	<link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div class="main-contents">
	<img src="./img/monkey.png" alt="monkey">
</div>

<div class="message">
	<p><?php echo "みなさま"?></p>
	<p>あけましておめでとうございます。</p>
	<p>昨年は大変お世話になりました。</p>
	<p>本年は昨年以上に課題も大変になるかと思いますが</p>
	<p>ともに乗り越えていきましょう！</p>
	<p>本年もどうぞ宜しくお願い致します。</p>
</div>

<div class="login-text">
	<p>新年の運試し！ということで</p>
	<p>アンケートに答えておみくじを引こう！</p>
	<p>↓↓ログインしてアンケートに答える↓↓</p>
</div>

<div class="login">
	<form action="input_enq.php" method="post">
		<dl>
			<dt>ID</dt>
			<dd><input type="text" id="my_id" name="my_id"></dd>
			<dt>パスワード</dt>
			<dd><input type="password" id="password" name="password"></dd>
		</dl>
		<div class="submit">
			<input type="submit" value="ログインする">
		</div>
	</form>
</div>



</body>
</html>