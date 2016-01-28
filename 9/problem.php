<?php
session_start();
$name = $_SESSION['name'];


?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/problem.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<title>勉強ページ2</title>
</head>

<body>

<div class="contents">
	
		<header>
		  <nav class="navbar">問題1</nav>
		  <p>ようこそ <?php echo htmlspecialchars($name);?> さん！</p>
		</header>
	<div class="problem">
		<h2>問題</h2>
		<p>XMLドキュメントをオブジェクトに変換するための関数はどれか</p>

		<ol>
			<li class="first" id="first"><a href="http://php.net/manual/ja/function.gettimeofday.php">gettimeofday()</a></li>
			<li class="second" id="second"><a href="http://php.net/manual/ja/function.m-getcellbynum.php">m_getcellbynum()</a></li>
			<li class="third" id="third"><a href="http://php.net/manual/ja/function.simplexml-load-file.php">simplexml_load_file()</a></li>
			<li class="fourth" id="fourth"><a href="http://php.net/manual/ja/function.imagerotate.php">imagerotate()</a></li>
		</ol>

	</div>

	<div class="back">
		<p><a href="study.php">解説に戻る</a></p>
	</div>

	<div class="logout">
		<p><a href="kadai_logout.php">ログアウトする</a></p>
	</div>

</div>

<script>
	$(function(){
		$('#first').on('click',function(){
			alert('不正解です！');
		});
		$('#second').on('click',function(){
			alert('不正解です！');
		});
		$('#third').on('click',function(){
			alert('正解です！');
		});
		$('#fourth').on('click',function(){
			alert('不正解です！');
		});

	});
</script>

</body>
</html>

