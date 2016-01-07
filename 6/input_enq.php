<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>アンケート記入ページ</title>
	<link rel="stylesheet" href="./css/enq_style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>
<div class="welcome">
	<h1>あけましておめでとうございます！<?php echo $_POST['my_id'];?>さん！</h1>
	<p id="open"><a href="#">アンケートフォームに回答する</a></p>

</div>

<div class="enq" id="enq">
	<form action="confirm_enq.php" method="post">
		<dl>
			<dt>名前</dt>
			<dd><input type="text" id="my_id" name="my_id" size="30" maxlength="255" class="name"></dd>
			<dt>出席番号</dt>
			<dd><input type="text" id="number" name="number" size="30" maxlength="255" class="number"></dd>
			<dt>メールアドレス</dt>
			<dd><input type="text" id="mail" name="mail" size="30" maxlength="255" class="mail"></dd>
			<dt>性別</dt>
			<dd>
				<input type="radio" id="gender_male" name="gender" value="男性"><label for="gender_male">男性</label>
				<input type="radio" id="gender_female" name="gender" value="女性"><label for="gender_female">女性</label>
			</dd>
			<dt>趣味（複数選択可）</dt>
			<dd>
				<input type="checkbox" id="hobby_1" name="hobby[]" value="スポーツ観戦"><label for="hobby_1">スポーツ観戦</label>
				<input type="checkbox" id="hobby_2" name="hobby[]" value="読書"><label for="hobby_2">読書</label>
				<input type="checkbox" id="hobby_3" name="hobby[]" value="音楽鑑賞"><label for="hobby_3">音楽鑑賞</label>
				<input type="checkbox" id="hobby_4" name="hobby[]" value="映画鑑賞"><label for="hobby_4">映画鑑賞</label>
				<input type="checkbox" id="hobby_5" name="hobby[]" value="カフェ巡り"><label for="hobby_5">カフェ巡り</label>
				<input type="checkbox" id="hobby_6" name="hobby[]" value="美術館巡り"><label for="hobby_6">美術館巡り</label>
				<input type="checkbox" id="hobby_7" name="hobby[]" value="食べ歩き"><label for="hobby_7">食べ歩き</label>
			</dd>
			<dt>去年の一番の思い出</dt>
			<dd><textarea name="lastyear" id="lastyear" cols="70" rows="10" class="lastyear"></textarea></dd>
			<dt>今年の抱負</dt>
			<dd><textarea name="thisyear" id="thisyear" cols="70" rows="10" class="thisyear"></textarea></dd>

		</dl>
		<div class="submit">
			<input type="submit" value="確認ページに進む">
		</div>
	</form>
</div>


<script>
	$(function(){
		$('#open').on('click',function(){
			$('#enq').fadeIn(1000);
		});
	});
</script>
</body>
</html>