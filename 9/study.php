<?php
session_start();
$name = $_SESSION['name'];


?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/study.css">

<title>勉強ページ1</title>
</head>

<body>

<div class="contents">
	<header>
	  <nav class="navbar">郵便番号APIを利用して、データを取り出してみよう！</nav>
	  <p>ようこそ <?php echo htmlspecialchars($name);?> さん！</p>
	</header>

	<h2>1.PHPの記述をしましょう。</h2>
	<p>Sublime Textなら「php」と入力してtabキーを押すと、下の図のようになります。便利。</p>

	<div class="image">
		<img src="img/01.png" alt="">
	</div>

	<h2>2.APIデータの取得をしましょう。</h2>
	<p>まずは<a href="http://zip.cgis.biz">http://zip.cgis.biz</a>にアクセスします。</p>

	<p>次はリクエスト例を参考にして、アドレスバーに、自分の家の郵便番号をパラメータに入れたアドレスを打ち込んでみましょう。</p>
	<p>僕の場合は116-0001なので、<a href="http://zip.cgis.biz/xml/zip.php?zn=1160001">http://zip.cgis.biz/xml/zip.php?zn=1160001</a>となります。</p>
	
	<div class="image">
		<img src="img/xml.png" alt="">
	</div>
	<p>↑こんな感じでデータが取れました！</p>


	<h2>3.phpを書き始めます。</h2>
	<p>今回は、xml形式でデータを取得しました。</p>
	<p>まずはデータを表示するために、xmlデータを入れる変数を決めましょう。</p>

	<div class="image">
		<img src="img/02.png" alt="">
	</div>

	<p>この図のように、$url、$xmlという変数を作り、データを格納します。</p>
	<p>ちなみに、simplexml_load_file()という関数は、指定したファイルの中の整形式、XMLドキュメントをオブジェクトに変換するためのものです。</p>
	<p>$urlに入っているデータをこれで変換して、取り出せる形にします。</p>
	
	<h2>4.var_dump()で確認します。</h2>
	<p>そしてvar_dump($xml)として出力します。</p>
	<div class="image">
		<img src="img/03.png" alt="">
	</div>

	<h2>5.XMLドキュメントを変換し、表示します。</h2>


	<div class="image">
		<img src="img/04.png" alt="">
	</div>

	<p>これでXMLドキュメントをオブジェクトに変換することができました。</p>
	<p>意外とデータを取ってきて、形式を変換して表示する、っていうのは簡単にできちゃうものなんですね！</p>

	<p>さて、もう一息。最後にこちらを書きましょう。</p>

	<div class="image">
		<img src="img/05.png" alt="">
	</div>

	<p>echo (string) $xml->ADDRESS_value->value[5]->attributes()->city;</p>
	<p>?????</p>

	<p>急になんぞこれは。。。と思った方もいらっしゃるかもしれませんが、安心してください。大したことないですから。</p>

	<p>要は何かと言うと、先ほどのデータに入っているオブジェクトをブラウザ上に引っ張り出してくるためのコードです。</p>

	<p>$xml->ADDRESS_value->value[5]のところからオブジェクトを取ってきますよ、として</p>
	<p>attributes()->cityで「荒川区」という情報にたどり着く、といった感じです。</p>
	<p>アラカワク、という読みがなを表示させたい場合は、echo (string) $xml->ADDRESS_value->value[1]->attributes()->city_kana;</p>
	<p>とすれば良いわけです。なんて簡単！</p>

	<p>郵便番号APIの利用方法は様々あるかと思いますが、一番わかりやすいのは「郵便番号自動入力」ですね。</p>
	<p>郵便番号入れたら、自動で地名まで入れてくれるあれです。いやあ、そんなことまでできちゃうとは勉強になりました。</p>

	<p>郵便番号の自動入力については<a href="http://lab.gpol.co.jp/tsubo/2011/08/api2.php">こちら</a>を参考にしてチャレンジしてみてください。</p>

	<p>今回はこれでおしまい。最後まで読んでいただきありがとうございました！</p>

	<p>次のページに、今回学習したことを定着させるための問題があります！腕試しに解いてみましょう！</p>

	<div class="next">
		<p><a href="problem.php">問題を解く</a></p>
	</div>

	<div class="logout">
		<p><a href="kadai_logout.php">ログアウトする</a></p>
	</div>

</div>

</body>
</html>

