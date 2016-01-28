<?php
session_start();

$_SESSION['name'] = $_POST['name'];
$_SESSION['lid'] = $_POST['lid'];
$_SESSION['lpw'] = $_POST['lpw'];



//2. DB接続します
$pdo = new PDO('mysql:dbname=study;host=localhost','root','');

//2. DB文字コードを指定(固定)
$stmt = $pdo->query('SET NAMES utf8');

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO study_user_table (id, name, lid, lpw, kanri_flg, life_flg)VALUES(NULL, :name, :lid, :lpw, 0, 0)");
$stmt->bindValue(':name', $_SESSION['name']);
$stmt->bindValue(':lid', $_SESSION['lid']);
$stmt->bindValue(':lpw', $_SESSION['lpw']);


$status = $stmt->execute();

?>

<?php
//1. HTML_STARTをインクルード
$title = "ユーザー登録完了"; //html_start.phpのtitleタグに表示
include("kadai_html_start.php");

?>

<p>登録しました。</p>
<p><a href="study.php">早速勉強する</a></p>

<?php
//2. HTML_ENDをインクルード
include("kadai_html_end.php");
?>

