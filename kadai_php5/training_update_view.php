<?php
//１．PHP
//select.phpのPHPコードをマルっとコピーしてきます。
//※SQLとデータ取得の箇所を修正します。
$id = $_GET["id"];
include("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM training_table WHERE id=:id"; //bind変数「:id」を入れる
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //bind変数＝変な値入っていたらはじく
$status = $stmt->execute(); //SQL実行

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$v =  $stmt->fetch(PDO::FETCH_ASSOC); //先頭の1レコードを取得
?>
<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
理由：入力項目は「登録/更新」はほぼ同じになるからです。
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="training_list.php">一覧に戻る</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="training_update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>トレーニング記録</legend>
     <label>日付：<input type="text" name="indate" value="<?=$v["indate"]?>"></label><br>
     <label>メニュー：<input type="text" name="menu" value="<?=$v["menu"]?>"></label><br>
     <label>感想質問：<textarea name="comment" rows="4" cols="40"> <?=$v["comment"]?></textarea><br>
     <input type="submit" value="更新">
     <input type="hidden" name="id" value="<?=$v["id"]?>"> 
    </fieldset>
  </div>
</form>
<!-- Main[End] -->



</body>
</html>






