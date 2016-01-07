<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>アンケート内容確認ページ</title>
	<link rel="stylesheet" href="./css/input_finish_style.css">
</head>
<body>
	<div class="confirm_message">
		<h1>ご協力ありがとうございました！</h1>
		<h2>下記の内容で受け付けました！</h2>
	</div>
	<div class="enq_answer">
		<dl>
			<dt>名前</dt>
			<dd><p class="ans-one"><?php echo htmlspecialchars($_SESSION['my_id']);?></p></dd>
			
			<dt>出席番号</dt>
			<dd><p class="ans-two"><?php echo htmlspecialchars($_SESSION['number']);?></p></dd>
			
			<dt>メールアドレス</dt>
			<dd><p class="ans-three"><?php echo htmlspecialchars($_SESSION['mail']);?></p></dd>
			
			<dt>性別</dt>
			<dd><p class="ans-four"><?php echo htmlspecialchars($_SESSION['gender']);?></p></dd>
			
			<dt>趣味</dt>
			<dd><p class="ans-five"><?php foreach ($_SESSION['hobby'] as $hobby) {
				echo htmlspecialchars($hobby,ENT_QUOTES).'<br>';
			}?></p></dd>
			
			<dt>去年の一番の思い出</dt>
			<dd><p class="ans-six"><?php echo htmlspecialchars($_SESSION['lastyear']);?></p></dd>
			
			<dt>今年の抱負</dt>
			<dd><p class="ans-seven"><?php echo htmlspecialchars($_SESSION['thisyear']);?></p></dd>

		</dl>
	</div>
	<div class="next">
		<p><a href="fortune.php" class="fortune">おみくじを引きに行く</a></p>

		<p><a href="show_enq.php" class="show_enq">アンケートの回答結果を見る</a></p>
	</div>
</body>
</html>