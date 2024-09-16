<?php
//１．PHP
//select.phpのPHPコードをマルっとコピーしてきます。
//※SQLとデータ取得の箇所を修正します。
$id = $_GET["id"];
include("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM gs_user_table WHERE id=:id"; //bind変数「:id」を入れる
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


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/sample.css">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default"  style="background-color:#808080;">
    <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="admin_list_view.php">
        一覧に戻る
      </a>
    </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="admin_update.php">
  <div class="jumbotron ml-5">
  <legend style="color:blueviolet; margin-left:20px;" >管理者【更新】画面</legend>
   <ul class="d-flex justify-content-center text-left">
    <li><label>名前：<input type="text" name="name" placeholder="ドコモ太郎" required value="<?=$v["name"]?>"></label><br></li>
    <li><label>id：<input type="text" name="lid" placeholder="123456789" required value="<?=$v["lid"]?>"></label><br></li> 
    <li><label>pw：<input type="password" name="lpw" required value="<?=$v["lpw"]?>"></label><br></li>
    <li>
      <label>管理者属性：
        <div style="display:flex; font-weight:normal; padding:0;"> 
           <div><input type="radio" id="admin" name ="kanri_flg" value="0" checked required>管理者</div>
           <div><input class="pl-5" type="radio" id="super_admin" name ="kanri_flg" value="1" required>スーパー管理者</div>
        </div>
      </label><br>
    </li>
    <li>
      <label>実行処理：
        <div style="display:flex; padding-left:10px; font-weight:normal;padding:0;">
          <div><input type="radio" id="out" name ="life_flg" value="0" checked required>退社</div>
          <div><input type="radio" id="in" name ="life_flg" value="1"  required>入社</div>
        </div>
      </label><br>
    </li>
    <li><input type="submit" value="更新"></li>
   </ul>
   <input type="hidden" name="id" value="<?=$v["id"]?>"> 
</div>
</form>
<!-- Main[End] -->



</body>
</html>






