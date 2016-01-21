<?php
//★Point: XSS
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
$i=0;
if($flag==false){
  $view = "SQLエラー";
}else{
  while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){
    if($i==0){
      //ループ初回のみ、ここを処理
      $view .= '"'.view($res['img']).','.view($res['lat']).','.view($res['lon']).','.view($res['input_date']).'"';
    }else{
      //ループ2回めからこちらを処理
      $view .=',"'.view($res['img']).','.view($res['lat']).','.view($res['lon']).','.view($res['input_date']).'"';
    }
    $i++;
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>MAP表示デモ</title>
<style>
  p{
    color:white
  }
  #map_area{
    position: relative;
    height: 500px;
    padding: 20px;
  }
  #myMap{
    width:95%;
  }
  #myMapimg{
    width:100%;
  }

</style>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body id="main">

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="#">R-STORE 物件検索</a></div>
  </nav>
</header>
<!-- Head[End] -->


<!-- IMG_LIST[Start] -->
 <div class="container-fluid">
  <!-- Main[Start] -->
   <div id="map_area">
    <div id="myMap"></div>
  </div>
  <!-- Main[End] -->
 <div><input id="img_width_range" type="range" step="5" max="600" min="20" value="200"></div>
</div>
<!-- IMG_LIST[END] -->

<!-- Javascript -->
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="http://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=7.0&amp;mkt=ja-jp"></script>
<script>
//★POINT
$("#img_width_range").on("change",function(){
  $("#myMap div a>img").css("width", $(this).val()+"px");
});

//******************************************************************
//MAP
//******************************************************************
//初期化
var G = {
    point: new Array(<?=$view?>), //★PHP変数から配列データを作成
    map: null, //mapオブジェクトを代入するための変数
    zoom: 14,  //地図表示ZOOM設定値（数値が大きいほうがZOOM）
    latitude: "35.660056",  //小数点3位 くらいの数値を上下させると地図の中心も上下する（感覚値として）
    longitude: "139.714546" //小数点3位 くらいの数値を上下させると地図の中心も上下する（感覚値として）
};
//メイン処理
function LoadMap() {
    //====================================================
    //MAP初期化処理
    //====================================================
    G.map = new Microsoft.Maps.Map($('#myMap')[0], {
        credentials: "AjZfxCbJYKjowxbzps0-btR4TxGivteXX6ubSJNtcVzEu9KbJThj-dWeJ2pA3onp",
        mapTypeId: Microsoft.Maps.MapTypeId.road, //.aerial, .birdseye[英語表記になる]
        zoom: G.zoom,
        center: new Microsoft.Maps.Location(G.latitude, G.longitude)
    });

    //====================================================
    //複数ピン処理
  　//====================================================
    var pin_count = G.point.length;
    for (var i=0; i<pin_count; i++) {
        //point配列をスプリット
        var locations = G.point[i];
        var gpoint = locations.split(",");

      //-------------------------------------------------
      //ピン設定（Default機能を使う方法）
      //-------------------------------------------------
        //登録日時の文字数を取得(cssのemで使用※半角なので÷２)
        var strl = (gpoint[3].length) / 2; //gpoint[3]=登録日時
        //pinオプションを設定
        var pin_options = {
           //プッシュピンが指し示す地点
              anchor: new Microsoft.Maps.Point(0, 0),
           //htmlを使用して画像を表示
              htmlContent:'<img src="'+gpoint[0]+'" width="50"><p style="width:'+strl+'em;">'+gpoint[3]+'</p>'
         };

        //-------------------------------------------------
        //PINをMAPに設定する処理
        //-------------------------------------------------
        var pushpin = new Microsoft.Maps.Pushpin(G.map.getCenter(), pin_options);
        pushpin.setLocation(new Microsoft.Maps.Location(gpoint[1], gpoint[2]));
        G.map.entities.push(pushpin);
    }

}

//メイン処理開始
LoadMap();
</script>
</body>
</html>
