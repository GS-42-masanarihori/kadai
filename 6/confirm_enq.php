<?php 

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
//POST→SESSIONとなった情報を取得
$myid = $_SESSION['my_id'];
$number = $_SESSION['number'];
$mail = $_SESSION['mail'];
$gender = $_SESSION['gender'];
if(empty($_SESSION['hobby'])){
	$hobby = 'なし';
}else{
	$hobby = implode(',', $_SESSION['hobby']);
}
$lastyear = $_SESSION['lastyear'];
$thisyear = $_SESSION['thisyear'];

//配列をcsvファイルに書き込む準備
$title = ['名前','出席番号','メールアドレス','性別','趣味','去年の一番の思い出','今年の抱負'];
$vararray = [$myid,$number,$mail,$gender,$hobby,$lastyear,$thisyear];
//文字列をUTF-8から変換
mb_convert_variables('SJIS-win', 'UTF-8', $title);
mb_convert_variables('SJIS-win', 'UTF-8', $vararray);
//ファイルへ書き込み実行
$handle = fopen('data/data.csv','a');
flock($handle,LOCK_EX);
fputcsv($handle,$title);
fputcsv($handle,$vararray);
flock($handle,LOCK_UN);
fclose($handle);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>アンケート内容確認ページ</title>
	<link rel="stylesheet" href="./css/confirm_style.css">
	
</head>
<body>
	<div class="confirm_message">
		<p>内容はこれで良いですか？</p>
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
	<div class="enq_submit">
		<p><a href="input_finish.php">アンケートを送信する</a></p>
	</div>
</body>
</html>