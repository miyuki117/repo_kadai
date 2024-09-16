<?php
//エラー表示
ini_set("display_errors", 1);

//1.  DB接続します
include("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM gs_user_table";
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
  <title>管理者一覧</title>
  <link rel="stylesheet" href="css/range.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default" style="background-color:#808080;">
    <div class="container-fluid"> 
    <div class="navbar-header" >
      <div><a class="navbar-brand" href="admin_index.php">登録画面へ</a></div>


      </div> 

    </div>
  </nav>
</header>
<!-- Head[End] -->


<!-- Main[Start] -->
<div>
 <div class="col-5 ml-3">
<table class="table table-striped">
  <thead>
    <th>管理者一覧</th>
    <tr>
    <td>管理者名</td>
    <td>ID</td>
    <td>PW</td>
    <td>属性</td>
    <td>ステータス</td>
  </tr>
  </thead>
<?php foreach($values as $v){  
   $kanri_flg =$v["kanri_flg"];
   if ($kanri_flg ==0){
      $kanri = "管理者";
   }else if($kanri_flg ==1){
    $kanri = "スーパー管理者";
   }else{
    break;
   }

   $life_flg =$v["life_flg"];
   if ($life_flg ==0){
      $life = "退社";
   }else if($life_flg ==1){
    $life = "入社";
   }else{
    break;
   }

  ?>
  <tr>
    <td><?=$v["name"]?></td>
    <td><?=$v["lid"]?></td>
    <td><?=$v["lpw"]?></td>
    <td><?=$kanri?></td>
    <td><?=$life?></td>
    <td><a href="admin_update_view.php?id= <?=h($v["id"])?>" type="button">📝</a></td>
    <td><a href="admin_delete.php?id= <?=h($v["id"])?>" type="button">🚮</a></td>
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
