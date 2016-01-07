<?php
session_start();
$text1 = '';
$text2 = '';
$text3 = '';
$text4 = '';
$text5 = '';
$text6 = '';

$fortune = array('大吉','中吉','小吉','吉','末吉','凶','大凶');
$result = $fortune[mt_rand(0,count($fortune)-1)];
if($result == '大吉'){
	$text1 = '学問：うまくいくでしょう。';
	$text2 = '待ち人：来るでしょう';
	$text3 = '争い：無事に解決するでしょう。';
	$text4 = '転居：北西の方角が良いでしょう。';
	$text5 = '病気：治るでしょう。';
	$text6 = '商い：うまくいくでしょう';
}

if($result == '中吉'){
	$text1 = '学問：そこそこうまくいくでしょう。';
	$text2 = '待ち人：おそらく来るでしょう';
	$text3 = '争い：おそらく無事に解決するでしょう。';
	$text4 = '転居：まあまあ良いでしょう。';
	$text5 = '病気：おそらく治るでしょう。';
	$text6 = '商い：おそらくうまくいくでしょう';
}

if($result == '小吉'){
	$text1 = '学問：たぶんうまくいくでしょう。';
	$text2 = '待ち人：たぶん、きっと、来るでしょう';
	$text3 = '争い：解決するかもしれません。';
	$text4 = '転居：小さなトラブルはあるかもしれませんが、大丈夫です。';
	$text5 = '病気：日々の健康に気をくばりましょう。';
	$text6 = '商い：すぐには結果は出ませんが、うまくいくでしょう';
}

if($result == '吉'){
	$text1 = '学問：そこそこうまくいくでしょう。';
	$text2 = '待ち人：そこそこ来るでしょう';
	$text3 = '争い：思った通りにはいかないかもしれませんが、解決するでしょう。';
	$text4 = '転居：まあまあの物件に住めるでしょう。';
	$text5 = '病気：6割くらい治るでしょう。';
	$text6 = '商い：失敗はあるかもしれませんが、うまくいくでしょう';
}

if($result == '末吉'){
	$text1 = '学問：努力次第でうまくいくでしょう。';
	$text2 = '待ち人：頑張れば来るかもしれません。';
	$text3 = '争い：あまり自慢をしすぎると争いごとが大きくなります。';
	$text4 = '転居：あまりしない方がいいかと思います。';
	$text5 = '病気：油断すると危ないです。';
	$text6 = '商い：なかなかうまくいかないことが多いですが、努力次第でなんとかなるでしょう。';
}

if($result == '凶'){
	$text1 = '学問：かなりやばそうです。';
	$text2 = '待ち人：おそらく来なさそうです。';
	$text3 = '争い：結構争うでしょう。';
	$text4 = '転居：するなとは言いませんが、注意したほうがいいでしょう。';
	$text5 = '病気：気をぬくと危ないかもしれません。';
	$text6 = '商い：かなり厳しいでしょう。';
}

if($result == '大凶'){
	$text1 = '学問：やばそうです。';
	$text2 = '待ち人：来なさそうです。';
	$text3 = '争い：随時争うでしょう。';
	$text4 = '転居：事故物件には気をつけて。';
	$text5 = '病気：注意。特に腰。';
	$text6 = '商い：かなり気をつけないと失敗します。';
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>今年の運勢を占うおみくじ</title>
	<link rel="stylesheet" href="./css/fortune_style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>
	<div class="fortune-title">
		<h1><?php echo htmlspecialchars($_SESSION['my_id']); ?>さんの今年の運勢は？</h1>
	</div>
	<div class="fortune-text" id="fortune-text">
		<p class="result"><?php echo $result; ?>です！</p>
		<p><?php echo $text1; ?></p>
		<p><?php echo $text2; ?></p>
		<p><?php echo $text3; ?></p>
		<p><?php echo $text4; ?></p>
		<p><?php echo $text5; ?></p>
		<p><?php echo $text6; ?></p>
	</div>
	<div class="others">
		<p><a href="<?php echo $_SERVER["SCRIPT_NAME"];?>" class="again" id="again">もう一度おみくじを引く</a></p>
		<p><a href="logout.php" class="logout">ログアウトする</a></p>
	</div>

	<script>
		$(function(){
			$('#fortune-text').fadeIn(5000);
		});
	</script>
</body>
</html>