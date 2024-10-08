<?php
ini_set("display_errors", 1);

//$_SESSION使うよ！
session_start();

$id = $_GET["id"]; //?id~**を受け取る

include("funcs.php");
$pdo = db_conn();

sschk();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//３．データ表示
$values = "";
if($status==false) {
    sql_error($stmt);
}else{
  $v = $stmt->fetch(PDO::FETCH_ASSOC); //変数vでSELSCTクエリから1行分のデータ取得（FETCH_ASSOCは連想配列）
}


?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
<header>
    <?php echo $_SESSION["name"]; ?>さま
    <?php include("menu1.php"); ?>
</header>

</header>
<!-- Head[End] -->


<!-- Main[Start] -->
<form method="post" action="user_update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ユーザー登録</legend>
     <label>名前：<input type="text" name="name" value="<?=$v["name"]?>"></label><br>
     <label>Login ID：<input type="text" name="lid" value="<?=$v["lid"]?>"></label><br>
     <label>Login PW<input type="password" name="lpw"></label><br>
     <label>管理FLG：
      一般<input type="radio" name="kanri_flg" value="0">　
      管理者<input type="radio" name="kanri_flg" value="1">
     <input type="hidden" name="id" value="<?=$v["id"]?>"> 

    </label>
    <br>
     <!-- <label>退会FLG：<input type="text" name="life_flg"></label><br> -->
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>

<!-- Main[End] -->


</body>
</html>
