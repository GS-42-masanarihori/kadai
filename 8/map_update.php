<?php

//XSS
function view($val){
  return htmlspecialchars($val,ENT_QUOTES,'UTF-8');
}
//1. DB接続
$pdo = new PDO('mysql:dbname=map;host=localhost', 'root', '');

//2. DB文字コードを指定
$stmt = $pdo->query('SET NAMES utf8');
//３．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM map_info");

//４．SQL実行
$flag = $stmt->execute();

$view="";

if($flag==false){
  $view = "SQLエラー";
}else{
$result = $stmt->fetch(PDO::FETCH_ASSOC);
var_dump($result['img']);
}
//３．データ登録SQL作成
// $update = $pdo->prepare("UPDATE map_info SET lat=:lat, lon=:lon, img=:img WHERE id=:id");􏰀

// $update ->bindValue(':lat',$lat);
// $update ->bindValue(':lon',$lon);
// $update ->bindValue(':img',$img);
// $update ->bindValue(':id', $id);

// 􏰀//SQL実行􏰀
// $flag = $update ->execute();􏰀


?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>情報更新</title>
</head>
<body>
<p>変更する内容を記入してください。</p>
	<form action="map_update_do.php" method="post">
		<p>id: <input type="text" name="id" value="<?php echo $result['id'];?>"></p>
		<p>lat: <input type="text" name="lat"></p>
		<p>lon: <input type="text" name="lon"></p>
		<p>img: <input type="text" name="img"></p>
		<p>input_date: <input type="text" name="input_date"></p>
		<input type="submit" value="内容を編集する"></p>
	</form>

</body>
</html>