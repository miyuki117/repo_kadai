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
<body>

<header>
  <p>ブックマークアプリ</p>
  <nav class="navbar navbar-default">LOGIN</nav>
</header>

<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
<form name="form1" action="login_act.php" method="post">
<ul>
  <li>
  会員ID:<input type="text" name="lid" required>
  </li>
  <li>
  会員PW:<input type="password" name="lpw" required>
  </li>
  <li>
  <input type="submit" value="ログイン">
  </li>
</ul>
</form>


</body>
</html>