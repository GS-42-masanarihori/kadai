<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
<?php
$fp = fopen("data/data.csv", "r");		//ファイルを開く
flock($fp, LOCK_SH);					//ファイルロック
while ($array = fgetcsv( $fp )) {		//ファイルを読み込む
	$num = count($array);				//行数カウント
	for($i=0;$i<$num;$i++){
		echo $array[$i];
		echo "<br>";
	}
}
flock($fp, LOCK_UN);                      //ロック解除
fclose($fp);                              //ファイルを閉じる
?>

</body>

￼<?php

//csvファイルにして書き込む
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
//↑ここでエラー
flock($handle,LOCK_UN);
fclose($handle);

$file = fopen("data/data1.csv","a");	// ファイル読み込み
flock($file, LOCK_EX);			// ファイルロック
fputs($file, "This is a Pen." . PHP_EOL);
flock($file, LOCK_UN);			// ファイルロック解除
fclose($file);
?>



