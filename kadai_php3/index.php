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
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="bm_list_view.php">データの確認・変更</a></div>

    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="bm_insert.php">
  <div class="jumbotron">
   <div class="ml-5" >
    <legend>ブックマーク登録画面</legend>
    <ul class="d-flex justify-content-center text-left">
      <li><label>書籍名：<input type="text" name="book_name"></label><br></li>
      <li><label>書籍URL：<input type="text" name="book_url"></label><br></li>
      <li><label>書籍コメント：<input type="text" name="comment" rows="4" cols="40"></label><br></li>
     <input type="submit" value="送信">
    </div>
  </div>
</form>
<!-- Main[End] -->


</body>
<footer>
<div>※管理者画面は<a href="admin_index.php">こちら</a></div>
</footer>
</html>
