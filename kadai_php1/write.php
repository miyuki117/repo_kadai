<?php
$name = $_POST["name"];
$mail = $_POST["mail"];
$breakfast = $_POST["breakfast"];


//作成日時,名前,メールアドレス
$str = date("Y-m-d H:i:s").",".$name.",".$mail.",".$breakfast;
//File書き込み
$file = fopen("data/data.txt","a");	// ファイル読み込み
fwrite($file, $str."\n"); //ファイルを改行する
fclose($file);


?>


<html>
<head>
<meta charset="utf-8">
<title>File書き込み</title>
</head>
<body>

<h1>書き込みしました。</h1>
<h2>./data/data.txt を確認しましょう！</h2>

<ul>
<li><a href="read.php">読み込む</a></li>
<li><a href="post.php">戻る</a></li>
</ul>
</body>
</html>