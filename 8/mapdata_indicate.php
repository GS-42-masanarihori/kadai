<?php
//XSS
function view($val){
  return htmlspecialchars($val,ENT_QUOTES,'UTF-8');
}
//1. 接続します
$pdo = new PDO('mysql:dbname=map;host=localhost', 'root', '');

//2. DB文字コードを指定
$stmt = $pdo->query('SET NAMES utf8');

//３．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM map_info");

//４．SQL実行
$flag = $stmt->execute();

//データ表示
$view="";

if($flag==false){
  $view = "SQLエラー";
}else{
	while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
		$id = $result['id'];
		$lat = $result['lat'];
		$lon = $result['lon'];
		$img = $result['img'];
		$input_date = $result['input_date'];

		$view .= '<tr><td>'.view($id).'</td>'
				.'<td>'.view($lat).'</td>'
				.'<td>'.view($lon).'</td>'
				.'<td>'.view($img).'</td>'
				.'<td>'.view($input_date).'</td>'
				.'<td><a href="map_update.php?id=<?php echo htmlspecialchars($result['.'id'.'])?>">編集<a href="map_delete.php">削除</a></td></tr>';

		// $viewinput_date '<td>'.$input_date.'</td>';

	}
}


?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>情報更新</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>
<body>
	
	<table width="100%">
		<tr>
			<th scope="col">id</th>
			<th scope="col">lat</th>
			<th scope="col">lon</th>
			<th scope="col">img</th>
			<th scope="col">input_date</th>
			<th scope="col">編集・削除</th>
		</tr>
		
		<tr>
			<?php echo $view;?>
		</tr>
		
	</table>


	<form action="updated.php" method="post">
		
		<p><a href="map_list.php">Mapに戻る</a></p>
	</form>

<script>
	$(function(){
		$('#delete').on('click',function(){
			alert('本当に削除しますか？');
		});
	});
</script>
</body>
</html>