<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/kadaidata_insert.css">

<title>TOPページ</title>
</head>

<body>

<div class="contents">
<header>
 	<nav class="navbar">ユーザー登録</nav>
</header>
<div class="datainput">
	<form name="form" action="kadai_inserted.php" method="post" class="data">
		名前（漢字）:<input type="text" name="name" id="name"><br>
		ユーザーID:<input type="text" name="lid" id="lid"><br>
		パスワード:<input type="password" name="lpw" id="lpw"><br>
	
</div>
	<div class="register" id="register">
		<input type="submit" value="登録する">
	</div>
	</form>

</div>

</body>
</html>