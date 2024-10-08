<?php
session_start();
//※htdocsと同じ階層に「includes」を作成してfuncs.phpを入れましょう！
//include "../../includes/funcs.php";
include "funcs.php";
sschk();
?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="css/sample.css"> -->
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <?php echo $_SESSION["name"]; ?>さま
      <?php 
       $flg = $_SESSION["kanri_flg"];
       if ($flg==0){
        include("menu.php");
       }else if($flg==1){
        include("menu1.php");
       }
      ?>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="training_insert.php">
  <div class="jumbotron">
   <div class="ml-5" >
    <legend>トレーニング登録画面</legend>
    <ul class="d-flex justify-content-center text-left">
     <label>メニュー：<input type="text" name="menu"></label><br>
     <label>感想質問：<textarea name="comment" rows="4" cols="40"></textarea><br>
     <input type="submit" value="送信">
    </div>
  </div>
</form>
<!-- Main[End] -->


</body>
<footer>
</footer>
</html>
