<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<body>
<div class="jumbotron">
<fieldset>
<div>データを登録しました。</div>
</fieldset>
</div>
</body>
</html>


<?php
//エラー表示
ini_set("display_errors", 1); //0エラー非表示、１エラー表示

//1. POSTデータ取得
$book_name  = $_POST["book_name"];
$book_url  = $_POST["book_url"];
$comment = $_POST["comment"];


//2. DB接続します ★今後コピペ
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');

} catch (PDOException $e) {
  exit('DBError:'.$e->getMessage()); //DBエラーの表示（処理もとまるexit）
}


//３．データ登録SQL作成 ★テンプレのため覚える
$sql = "INSERT INTO gs_bm_table(book_name,book_url,comment,date)
VALUES(:book_name,:book_url,:comment,sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':book_name', $book_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':book_url', $book_url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Lovation: index.php");
  exit();


}
?>

