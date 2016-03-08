<?php 


?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>ログインページ</title>
	<link rel="stylesheet" href="css/loginsimple.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

	<style>
		/* Fonts */
@import url(http://fonts.googleapis.com/css?family=Open+Sans:400);

/* fontawesome */
@import url(http://weloveiconfonts.com/api/?family=fontawesome);
[class*="fontawesome-"]:before {
  font-family: 'FontAwesome', sans-serif;
}

/* Simple Reset */
* { margin: 0; padding: 0; box-sizing: border-box; }

/* body */
body {
  background: #e9e9e9;
  color: #5e5e5e;
  font: 400 87.5%/1.5em 'Open Sans', sans-serif;
}

/* Form Layout */
.form-wrapper {
  background: #fafafa;
  margin: 3em auto;
  padding: 0 1em;
  max-width: 370px;
}

h1 {
  text-align: center;
  font-size: 1.2em;
  padding: 1em 0;
}

form {
  padding: 0 1.5em;
}

.form-item {
  margin-bottom: 0.75em;
  width: 100%;
}

.form-item input {
  background: #fafafa;
  border: none;
  border-bottom: 2px solid #e9e9e9;
  color: #666;
  font-family: 'Open Sans', sans-serif;
  font-size: 1em;
  height: 50px;
  transition: border-color 0.3s;
  width: 100%;
}

.form-item input:focus {
  border-bottom: 2px solid #c0c0c0;
  outline: none;
}

.button-panel {
  margin: 2em 0 0;
  width: 100%;
}

.button-panel .button {
  background: #f16272;
  border: none;
  color: #fff;
  cursor: pointer;
  height: 50px;
  font-family: 'Open Sans', sans-serif;
  font-size: 1.2em;
  letter-spacing: 2px;
  text-align: center;
  text-transform: uppercase;
  transition: background 0.3s ease-in-out;
  width: 100%;
  border-radius: 4px;
}

.button:hover {
  background: #ee3e52;
}

.form-footer {
  font-size: 1em;
  padding: 2em 0;
  text-align: center;
}

.form-footer a {
  color: #8c8c8c;
  text-decoration: none;
  transition: border-color 0.3s;
}

.form-footer a:hover {
  border-bottom: 1px dotted #8c8c8c;
  /*別の色を指定するとtransitionにより#8c8c8cから色が変わる*/
}
	</style>
</head>
<body>
	<div class="form-wrapper">
		<h1>ログイン情報入力</h1>

		<form action="../editarea.html" method="post">
		    <div class="form-item">
		      <label for="email"></label>
		      <input type="email" name="email" required="required" placeholder="Email"></input>
		    </div>
		    <div class="form-item">
		      <label for="password"></label>
		      <input type="password" name="password" required="required" placeholder="Password"></input>
		    </div>
		    <div class="button-panel">
		      <input type="submit" class="button" title="Sign In" value="ログイン"></input>
		    </div>
 		</form>

	  <div class="form-footer">
	    <p><a href="#">新しくアカウントを作る</a></p><br>
	    <p><a href="#">パスワードをお忘れの場合はこちら</a></p>
	  </div>

	</div>
</body>
</html>