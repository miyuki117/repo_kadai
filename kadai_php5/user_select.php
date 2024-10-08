<?php
//エラー表示
ini_set("display_errors", 1);

//0. SESSION開始！！
session_start();

//１．関数群の読み込み
include("funcs.php");

//LOGINチェック → funcs.phpへ関数化しましょう！
sschk();


//２．データ登録SQL作成
$pdo = db_conn();
$sql = "SELECT * FROM gs_user_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
$json = json_encode($values,JSON_UNESCAPED_UNICODE);

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ユーザー一覧</title>
  <link rel="stylesheet" href="css/range.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>

<body id="main">
<!-- Head[Start] -->
<header>
<header>
  <?php echo $_SESSION["name"]; ?>さま
  <?php include("menu1.php"); ?>
</header>
</header>
<!-- Head[End] -->


<!-- Main[Start] -->
<div>
  <div class="col-5 ml-3">
  <table class="table table-striped">
    <thead>
    <tr>
      <td>id</td>
      <td>名前</td>
      <td></td>
    </tr>
    </thead>

    <?php foreach($values as $v){ ?>
      <tr>
        <td><?=$v["id"]?></td>
        <td><a href="user_detail.php?id=<?=h($v["id"])?>"><?=$v["name"]?></a></td>
        <td><a href="user_delete.php?id=<?=h($v["id"])?>">[削除]</a></td>
      </tr>
    <?php } ?>
  </table>

  </div>
</div>
<!-- Main[End] -->


<script>
  const a = '<?php echo $json; ?>';
  console.log(JSON.parse(a));
</script>
</body>
</html>
