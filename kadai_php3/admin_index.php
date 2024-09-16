<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>【管理者】登録画面</title>
  <script src="js/jquery-2.1.3.min.js"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/sample.css">

  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default navbar-dark" style="background-color:#808080;">
  <div class="container-fluid"> 
    <div class="navbar-header">
      <div><a class="navbar-brand" href="admin_list_view.php">管理者の確認・変更</a></div>
      </div>
    </div>
  </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->


<form method="post" action="admin_insert.php">
  <div class="jumbotron ml-5">
   <legend style="color:blueviolet; margin-left:20px;" >管理者登録画面</legend>
   <ul class="d-flex justify-content-center text-left">
    <li><label>名前：<input type="text" name="name" placeholder="ドコモ太郎" required></label><br></li>
    <li><label>id：<input type="text" name="lid" placeholder="123456789" required></label><br></li> 
    <li><label>pw：<input type="password" name="lpw" required></label><br></li>
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
    <li><input type="submit" value="送信"></li>
   </ul>
  </div>
</form>
<!-- Main[End] -->


</body>

<footer>
  <div>※ブックマーク登録画面は<a href="index.php">こちら</a></div>
</footer>

</html>
