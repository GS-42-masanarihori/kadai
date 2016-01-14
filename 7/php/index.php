<?php
	//requireでデータ接続のphpを受け取る
	require('dbconnect.php');
	
	$page = $_REQUEST['page'];

	if($page == ''){
		$page = 1;
	}
	$page = max($page,1);
	//最終ページを取得する
	$sql = 'SELECT COUNT(*) AS cnt FROM my_items';
	$recordSet = mysqli_query($db,$sql);
	$table = mysqli_fetch_assoc($recordSet);
	$maxPage = ceil($table['cnt'] / 5);
	$page = min($page,$maxPage);
	$start = ($page - 1) * 5;

	//$recordSetに検索結果が入る

	$recordSet = mysqli_query($db, 'SELECT m.name, i.* FROM makers m, my_items i WHERE m.id=i.maker_id ORDER BY id DESC LIMIT '.$start.',5');
	

	?>	

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>sample</title>
</head>

<style>
	th{
		background-color: #e0e0e0;
	}
	table,th,td{
		border: solid 1px black; 
		border-collapse: collapse;
		text-align: center;
	}
	li{
		display: block;
		float: left;
		width: 100px;
		margin-right: 10px;
	}
	.register{
		width: 20%;
		margin: 0 auto;
		background-color: black;
		text-align: center;
		border-radius: 4px;
	}

	.register a{
		text-decoration: none;
		color: white;
	}

	.pageChange{
		width: 20%;
		margin: 0 auto;
	}

</style>
<body>
<div class="register">
	<p><a href="input.php">新しい商品を登録する</a></p>
</div>
	<table width="100%">
		<tr>
			<th scope="col">ID</th>
			<th scope="col">メーカー</th>
			<th scope="col">商品名</th>
			<th scope="col">価格</th>
			<th scope="col">編集・削除</th>
		</tr>
		<?php
			while($table = mysqli_fetch_assoc($recordSet)){
		?>
		<tr>
			<td><?php echo htmlspecialchars($table['id']); ?></td>
			<td><?php echo htmlspecialchars($table['name']) ;?></td>
			<td><?php echo htmlspecialchars($table['item_name']); ?></td>
			<td><?php echo htmlspecialchars($table['price']); ?></td>
			<td>
				<a href="update.php?id=<?php echo htmlspecialchars($table['id']);?>">編集</a>
				<a href="delete.php?id=<?php echo htmlspecialchars($table['id']);?>" onclick="return confirm('削除してよろしいですか？');">削除</a>
			</td>
		</tr>
		<?php
			}
		?>
	</table>
	<div class="pageChange">
		<ul class="paging">
		<?php
			if($page > 1){
		?>
			<li><a href="index.php?page=<?php echo $page - 1; ?>">前のページへ</a></li>
		<?php
			}else{
		?>
		<li>前のページへ</li>

		<?php
			}
		?>

		<?php
			if($page < $maxPage){
		?>
			<li><a href="index.php?page=<?php echo $page + 1; ?>">次のページへ</a></li>
		<?php
			}else{
		?>
		<li>次のページへ</li>
		<?php
			}
		?>
		</ul>
	</div>
</body>
</html>

