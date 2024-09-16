<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
  <title>【管理者】登録処理</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/jquery-2.1.3.min.js"></script>
  <link rel="stylesheet" href="css/sample.css">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="bm_list_view.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<body>


</body>
</html>


<?php
//エラー表示
ini_set("display_errors", 1); //0エラー非表示、１エラー表示

//1. POSTデータ取得
$name  = $_POST["name"];
$lid  = $_POST["lid"];
$lpw = $_POST["lpw"];
$kanri_flg = $_POST["kanri_flg"];
$life_flg = $_POST["life_flg"];



//2. DB接続します 
include("funcs.php");
$pdo =db_conn();


//３．データ登録SQL作成 
$sql = "INSERT INTO gs_user_table(
name,
lid,
lpw,
kanri_flg,
life_flg
)VALUES(
:name,
:lid,
:lpw,
:kanri_flg,
:life_flg
)";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':life_flg', $life_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後

if($status==false){
  sql_error($stmt);
}else{  
 redirect("admin_list_view.php"); 
  exit(); 
}
?>


