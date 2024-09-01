<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
 <?$file = fopen('data/data.txt', 'r'); // ファイルを開く

// ファイル内容を1行ずつ読み込んで出力
while ($str = fgets($file)) {
    echo nl2br($str); // nl2br() ... 改行文字を追加
}
fclose($file); // ファイルを閉じる


?>

</body>
</html>