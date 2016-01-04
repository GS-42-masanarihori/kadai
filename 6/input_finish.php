<?php 

//アンケート終了、THANK YOU ページ

//入力した内容を確認したい場合はこちらというボタンを押したらshow_enq.phpへ

//ご協力ありがとうございました！
//下記の「おみくじを引く！」ボタンを押して、今年の運勢を占いましょう！
//

session_start();

if(isset($_POST['my_id'])){
	$_SESSION['my_id'] = $_POST['my_id'];
}

if(isset($_POST['number'])){
	$_SESSION['number'] = $_POST['number'];
}

if(isset($_POST['mail'])){
	$_SESSION['mail'] = $_POST['mail'];
}

if(isset($_POST['gender'])){
	$_SESSION['gender'] = $_POST['gender'];
}

if(isset($_POST['hobby'])){
	$_SESSION['hobby'] = $_POST['hobby'];
}

if(isset($_POST['lastyear'])){
	$_SESSION['lastyear'] = $_POST['lastyear'];
}

if(isset($_POST['thisyear'])){
	$_SESSION['thisyear'] = $_POST['thisyear'];
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>アンケート内容確認ページ</title>
	<link rel="stylesheet" href="./css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>
	<div class="confirm_message">
		<h1>ご協力ありがとうございました！</h1>
		<h2>下記の内容で受け付けました！</h2>
	</div>
	<div class="enq_answer">
		<!-- 名前 -->
		<p class="ans-one"><?php echo htmlspecialchars($_SESSION['my_id']);?></p>
		<!-- 出席番号 -->
		<p class="ans-two"><?php echo htmlspecialchars($_SESSION['number']);?></p>
		<!-- メールアドレス -->
		<p class="ans-three"><?php echo htmlspecialchars($_SESSION['mail']);?></p>
		<!-- 性別 -->
		<p class="ans-four"><?php echo htmlspecialchars($_SESSION['gender']);?></p>
		<!-- 趣味 -->
		<p class="ans-five"><?php foreach ($_SESSION['hobby'] as $hobby) {
			echo htmlspecialchars($hobby,ENT_QUOTES).'<br>';
		}?></p>
		<!-- 去年の思い出 -->
		<p class="ans-six"><?php echo htmlspecialchars($_SESSION['lastyear']);?></p>
		<!-- 今年の抱負 -->
		<p class="ans-seven"><?php echo htmlspecialchars($_SESSION['thisyear']);?></p>
	</div>
	<div class="next">
		<p><a href="fortune.html">おみくじを引きに行く</a></p>

		<p><a href="show_enq.php">アンケートの回答結果を見る</a></p>
	</div>
</body>
</html>