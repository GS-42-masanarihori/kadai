<?php
$db = mysqli_connect('localhost','root','','mydb') or die(mysqli_connect_error());
mysqli_set_charset($db,'utf8');
$request = "' OR ' '='";

$safeSql = sprintf("SELECT * FROM test_table WHERE password='%s",
		mysqli_real_escape_string($db,$request)
	);
echo $safeSql;
?>