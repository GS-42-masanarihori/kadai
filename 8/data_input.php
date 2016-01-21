<?php
 //**********************************************************
 // *  fileupload.php
 // *  FileUpLoad
 //**********************************************************
//最初に受け取るパラーメータや使用する変数を記述しておきましょう。
session_start();
$img = "";

//FileUpload処理
if (!isset($_FILES['upfile']['error']) || !is_int($_FILES['upfile']['error']) || !isset($_POST["file_upload_flg"]) || $_POST["file_upload_flg"]!="1") {
  //echo 'パラメータが不正です';
}else{
 $lat = $_POST["lat"];
 $lon = $_POST["lon"];
 $file_name = $_FILES["upfile"]["name"];  //"1.jpg"ファイル名取得
 $extension = pathinfo($file_name, PATHINFO_EXTENSION); //拡張子取得
 $tmp_path  = $_FILES["upfile"]["tmp_name"]; //"/usr/www/tmp/1.jpg"アップロード先のTempフォルダ
 $uniq_name = date("YmdHis").session_id() . "." . $extension; //ユニークファイル名作成

  // FileUpload [--Start--]
  if ( is_uploaded_file( $tmp_path ) ) {
    if ( move_uploaded_file( $tmp_path, "upload/".$uniq_name ) ) {
      chmod( "upload/".$uniq_name, 0644 );
      echo $uniq_name."をアップロードしました。";
      $img = '<img src="upload/'.$uniq_name.'" >';

      //1. 接続します
      $pdo = new PDO('mysql:dbname=map;host=localhost', 'root', '');
      //2. DB文字コードを指定
      $stmt = $pdo->query('SET NAMES utf8');
      //３．データ登録SQL作成
      $stmt = $pdo->prepare("INSERT INTO map_info (id, lat, lon, img, input_date )VALUES(NULL, :lat, :lon, :img, sysdate())");
      $stmt->bindValue(':lat', $lat);
      $stmt->bindValue(':lon', $lon);
      $stmt->bindValue(':img', "upload/".$uniq_name);
      $status = $stmt->execute();
      if($status==false){
        echo "SQLエラー";
        exit;
      }else{
        echo "登録完了！";
      }

    } else {
      echo "Error:アップロードできませんでした。";
    }
  }
  // FileUpload [--End--]

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>写真アップロード</title>
<style>
fieldset{border:1px solid #666;padding:3px;}
#photarea{padding:5%;width:90%;background:black;}
img{width:100%}
#upload_btn{display:none;}
</style>
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body id="main">

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="#">仮の管理画面</a></div>
      <ul class="pager">
      <li class="previous disabled"><a href="data_input.php">カメラ / 写真選択</a></li>
      <li class="next"><a href="map_list.php">マップを確認する</a></li>
      <li class="next"><a href="map_update.php">情報を更新する</a></li>
      </ul>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div class="container-fluid">
  <div class="jumbotron">
    <div id="status">処理中・・・</div>

    <p><a href="#" id="select_btn" class="btn btn-primary btn-lg">カメラ/写真選択</a></p>
    <p><a href="#" id="upload_btn" class="btn btn-success btn-lg">Fileアップロード</a></p>
    <form method="post" action="data_input.php" enctype="multipart/form-data" id="send_file">
        <input type="file" accept="image/*" capture="camera" id="image_file" value="" name="upfile" style="opacity:0;">
        <input type="hidden" id="lat" name="lat">
        <input type="hidden" id="lon" name="lon">
        <input type="hidden" name="file_upload_flg" value="1">
        <!-- <div class="data" id="data">
          <p><input type="text" name="latitude" id="latitude"></p>
          <p><input type="text" name="longtitude" id="longtitude"></p>
            <input type="submit" value="登録する" id="data_input">
        </div> -->
    </form>
  </div>
  <div id="fileapi"><img id="image_view"></div>
  <div id="photarea"><?=$img?></div>
</div>
<!-- Main[End] -->


<!-- Javascript -->
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
//非表示のinput type="file"をクリック
$("#select_btn").on("click", function(){
   $("#image_file").trigger("click");
});

//File選択したら”Fileアップロード”ボタンを表示
$("#image_file").on("change",function(){
  //★ Point ：FileSize取得
  var file = $(this).get(0).files[0];
  // console.log(file.size);
  // console.log(file.name);
  // console.log(file.type);
  if(file.size / 1000 > 20000){
    alert("over");
    return false;
  }else{
    console.log("OK!!");
  }

  //Uploadボタン表示
  $("#upload_btn").show();
});

//アップロードボタン ”Submit”で送信
$("#upload_btn").on("click", function(){
   $("#send_file").submit();
});

// $("#data_input").on("click", function(){
//    $("#send_file").submit();
// });

/**
* Geolocation（緯度・経度）
*/
navigator.geolocation.watchPosition( //getCurrentPosition :or: watchPosition
  // 位置情報の取得に成功した時の処理
  function (position) {
    try {
      var lat = position.coords.latitude;  //緯度
      var lon = position.coords.longitude; //経度
      $("#lat").val(lat);
      $("#lon").val(lon);
      $("#status").html("緯度・経度、取得完了");
    } catch (error) {
      console.log("getGeolocation: " + error);
    }
  },
  // 位置情報の取得に失敗した場合の処理
  function (error) {
    var e = "";
    if (error.code == 1) { //1＝位置情報取得が許可されてない（ブラウザの設定）
      e = "位置情報が許可されてません";
    }
    if (error.code == 2) { //2＝現在地を特定できない
      e = "現在位置を特定できません";
    }
    if (error.code == 3) { //3＝位置情報を取得する前にタイムアウトになった場合
      e = "位置情報を取得する前にタイムアウトになりました";
    }
    $("#status").html("エラー：" + e);

  }, {
    // 位置情報取得オプション
    enableHighAccuracy: true,  //より高精度な位置を求める
    maximumAge: 20000,         //最後の現在地情報取得が20秒以内であればその情報を再利用する設定
    timeout: 10000             //10秒以内に現在地情報を取得できなければ、処理を終了
  }
);
</script>
</body>
</html>
