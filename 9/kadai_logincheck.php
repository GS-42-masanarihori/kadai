<?php
session_start();
include('func.php'); //外部ファイル読み込み（関数群の予定）

$lid = $_POST['lid'];
$lpw = $_POST['lpw'];

//1. 接続します
try {
  $pdo = new PDO('mysql:dbname=study;host=localhost', 'root', '');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//2. DB文字コードを指定
$stmt = $pdo->query('SET NAMES utf8');
if (!$stmt) {
  $error = $pdo->errorInfo();
  exit($error[2]);
}


//３．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM study_user_table WHERE lid=:lid AND lpw=:lpw AND life_flg=0");
$stmt->bindValue(':lid', $lid);
$stmt->bindValue(':lpw', $lpw);

$res = $stmt->execute();
//SQL実行時にエラーがある場合
if($res==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}

//５．抽出データ数を取得
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()
$val = $stmt->fetch(); //これは1レコードだけの情報を取得する方法


//6. 該当レコードがあればSESSIONに値を代入
if( $val["id"] != "" ){
  //ここでセッションを使い$_SESSION[]変数の中に値を入れる。
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["name"]      = $val['name'];
  header("Location: study.php");
}else{
  //logout処理を経由して前画面へ
  header("Location: kadai_logout.php");
}

exit();


?>

