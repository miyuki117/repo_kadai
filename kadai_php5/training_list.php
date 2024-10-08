<?php
//エラー表示
ini_set("display_errors", 1);

//0. SESSION開始！！
session_start();

//1.  DB接続します
include("funcs.php");
$pdo = db_conn();

//LOGINチェック → funcs.phpへ関数化しましょう！
sschk();

//２．データ登録SQL作成
$sql = "SELECT * FROM training_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  sql_error($stmt);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
//JSONい値を渡す場合に使う
$json = json_encode($values,JSON_UNESCAPED_UNICODE);


?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>トレーニング記録</title>
  <link rel="stylesheet" href="css/range.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css" >
  <style>div{padding: 10px;font-size:16px;}</style>
</head>



<body id="main" style="background-color:#FFFFEE;">

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
<div>
 <div class="col-5 ml-3">
<table class="table table-striped">
  <thead>
    <tr>
    <td>日付</td>
    <td>メニュー</td>
    <td>感想/質問</td>
    <td>トレーナーコメント</td>
  </tr>
  </thead>
<?php foreach($values as $v){ ?> 
  <tr>
    <td><?=$v["indate"]?></td>
    <td><?=$v["menu"]?></td>
    <td><?=$v["comment"]?></td>
    <td><?=$v["fb_comment"]?></td>
    <td><a href="fb_request.php?id= <?=h($v["id"])?>" type="button" id="text">トレーナーへ依頼する</a></td>
    <td><a href="training_update_view.php?id= <?=h($v["id"])?>" type="button">📝</a></td>
    <td><a href="training_delete.php?id= <?=h($v["id"])?>" type="button">🚮</a></td>
  </tr>

<?php } ?>
</table>


  </div>
</div>
<!-- Main[End] -->


<script>
  //JSON受け取り
  //ボタン押下の処理、変数








</script>
</body>
</html>
