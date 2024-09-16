<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
  <title>データ登録</title>
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
<!-- ロード画面の処理 ※登録完了後にindex.phpへ遷移するため表示されない -->
  <div class="jumbotron">
  <fieldset>
  <!-- ロード画面 -->
  <div >
  <div id="loading">データ登録中。。。</div>
  </div>
  <!-- コンテンツ部分 -->
  <div id="finished"  >
  <div>登録画面は<a href="index.php">こちら</a></div>
  </div>
  </fieldset>
  </div>

  <script>
    function onload (){
      const spinner = document.getElementById('loading');
      spinner.classList.add('loaded');
      // const finished = document.getElementById('finished');
      // finished.classList.toggle('hidden');
    };
  </script>
  <!-- ここまでロード画面の処理↑ -->

</body>
</html>


<?php
//エラー表示
ini_set("display_errors", 1); //0エラー非表示、１エラー表示

//1. POSTデータ取得
$book_name  = $_POST["book_name"];
$book_url  = $_POST["book_url"];
$comment = $_POST["comment"];


//2. DB接続します 
include("funcs.php");
$pdo =db_conn();


//３．データ登録SQL作成 
$sql = "INSERT INTO gs_bm_table(book_name,book_url,comment,date)VALUES(:book_name,:book_url,:comment,sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':book_name', $book_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':book_url', $book_url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後

if($status==false){
  sql_error($stmt);
}else{ ?>
<script type="text/javascript"> onload(); //ロード画面の処理（今回は自動遷移のため非表示）
</script> 
<?php 
 redirect("bm_list_view.php"); 
  exit(); 
}
?>


