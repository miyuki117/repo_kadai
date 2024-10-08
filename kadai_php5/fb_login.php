<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/main.css" />
<link rel="stylesheet" href="css/style.css" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
<title>ログイン</title>
</head>
<body style="background-color:#FFFFEE;">

<header>
  <p>トレーニング管理アプリ</p>
  <nav class="navbar navbar-default">LOGIN</nav>
  <div >
  <img style="height: 300px; margin-left:30px;" id="style" src="./img/workout2.webp" alt="" >
  </div>


</header>

<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
<form name="form1" action="fb_login_act.php" method="post">
<ul>
  <li>
  トレーナーID:<input type="text" name="lid" required>
  </li>
  <li>
  トレーナーPW:<input type="password" name="lpw" required>
  </li>
  <li>
  <input type="submit" value="ログイン">
  </li>
</ul>
</form>


利用者画面は<a href="login.php">こちら</a>


</body>
</html>