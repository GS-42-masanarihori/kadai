<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>sample</title>
</head>
<body>
	<div class="topMessage">
		<p>登録する商品の情報を入力してください。</p>
	</div>

	<div class="form">
	<form action="input_do.php" method="post" id="formInput">
		<dl>
			<dt>
				<label for="maker_id">メーカーID</label>
			</dt>
			<dd>
				<input type="text" name="maker_id" size="10" maxlength="10">
			</dd>
			<dt>
				<label for="item_name">商品名</label>
			</dt>
			<dd>
				<input type="text" name="item_name" size="35" maxlength="255">
			</dd>
			<dt>
				<label for="price">価格</label>
			</dt>
			<dd>
				<input type="text" name="price" size="10" maxlength="10">円
			</dd>
			<dt>
				<label for="keyword">キーワード</label>
			</dt>
			<dd>
				<input type="text" name="keyword" size="50" maxlength="255">
			</dd>
		</dl>

		<div class="submitBtn">
			<input type="submit" value="登録する">		
		</div>
	</form>

	</div>

	<?php

	?>	


</body>
</html>