<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table border="1">
  <tr>
    <th>
      id
    </th>
    <th>
      name
    </th>
    <th>
      mail
    </th>
    <th>
      breakfast
    </th>
  </tr>

  <ul>
    <li><a href="post.php">戻る</a></li>
  </ul>
  

 <?php
$file = fopen('data/data.txt', 'r'); // ファイルを開く

$str = fgets($file);

// ファイル内容を1行ずつ読み込んで出力
while ($str = fgets($file)) {
    echo "<tr>";
    $str2 =explode(",",$str); //1行ずつ 「,」で要素を区切って配列にする
for ($i=0; $i < count($str2); $i++) { 
    echo "<td>".$str2[$i]."</td>"; // 配列の要素を順番に表にする
}
echo "</tr>";
};

fclose($file); // ファイルを閉じる

?>



    
</body>
</html>