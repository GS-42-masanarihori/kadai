<?php
require('dbconnect.php');

$id = $_REQUEST['id'];

$sql = sprintf("SELECT * FROM my_items WHERE id=%d",
		mysqli_real_escape_string($db,$id)
	);
	
	$recordSet = mysqli_query($db,$sql);
	$data = mysqli_fetch_assoc($recordSet);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>sample</title>
	<style>
		dt,dd{
			margin-left: 20px;
		}

		.changeContents{
			width: 60%;
			margin: 0 auto;
			border: solid 2px #e0e0e0;
		}

		.changeContents p{
			text-align: center;
		}
		.changeButton{
			background-color: black;
			color: white;
			width: 20%;
			margin: 0 auto;
			border-radius: 4px;
		}

		.changeButton input{
			background-color: black;
			width: 100%;
			color: white;
			border: none;
			margin: 0 auto;
			cursor: pointer;
			border-radius: 4px;
		}

		.changeButton input:hover{
			opacity: 0.8;
		}
	</style>
</head>
<body>
<div class="changeContents">
	<p>変更する内容を記入してください。</p>
	<form action="update_do.php" method="post" id="frmUpdate" name="frmUpdate">
		<dl>
		<dt>
			<label for="maker_id">メーカーID</label>
		</dt>
		<dd>
			<input type="text" name="maker_id" id="maker_id" size="10" maxlength="10" value="<?php echo htmlspecialchars($data['maker_id'],ENT_QUOTES);?>">
		</dd>

		<dt>
			<label for="item_name">商品名</label>
		</dt>
		<dd>
			<input type="text" name="item_name" id="item_name" size="35" maxlength="255" value="<?php echo htmlspecialchars($data['item_name'],ENT_QUOTES);?>">
		</dd>
		<dt>
			<label for="price">価格</label>
		</dt>
		<dd>
			<input type="text" name="price" id="price" size="10" maxlength="10" value="<?php echo htmlspecialchars($data['price'],ENT_QUOTES);?>">円
		</dd>
		<dt>
			<label for="keyword">キーワード</label>
		</dt>
		<dd>
			<input type="text" name="keyword" id="keyword" size="50" maxlength="255" value="<?php echo htmlspecialchars($data['keyword'],ENT_QUOTES);?>">
		</dd>
		</dl>

		<div class="changeButton">
			<input type="submit" value="変更する">
			<input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id'],ENT_QUOTES);?>">
		</div>
	</form>
</div>
</body>
</html>

