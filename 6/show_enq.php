<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>アンケート回答内容</title>
<link rel="stylesheet" href="./css/show_enq_style.css">
</head>
<body>
<div class="answer">
	<h1>回答結果</h1>
</div>
<div class="enq_answer">
	<table id="enq_result" border="1" cellpadding="5" cellspacing="1">
        <?php
        $handle = fopen('data/data.csv','r');
        flock($handle,LOCK_SH);
        $csv = array_map('str_getcsv', file('data/data.csv'));
        mb_convert_variables('UTF-8','SJIS-win',$csv);
        $test = count($csv);
        for($i = 0;$i < $test; $i++){
            $num = count($csv[$i]);
            echo '<tr>';
            for($x = 0;$x < $num; $x++){
                echo '<td>'.$csv[$i][$x].'</td>';
            }
            echo '</tr>';
        }
        flock($handle, LOCK_UN);
        fclose($handle);
        ?>
    </table>
</div>
</body>

</html>