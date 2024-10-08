<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">


<style>div{padding: 10px;font-size:16px;}</style>
<title>ログイン</title>
</head>
<form name="form1" action="login_act.php" method="post" style="background-color:#FFFFEE;">
<form name="form1" action="login_act.php" method="post" style="background-color:#FFFFEE;">
<body style="background-color:#FFFFEE;">

<header>
  <p>トレーニング管理アプリ</p>
  <!-- <nav class="navbar navbar-default"> -->
  <nav class="navbar navbar-default navbar-dark" >LOGIN</nav>

  <img style="height: 300px; margin:30px;"  id="style" src="./img/workout.webp" alt="" >

</header>

<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
 <div style="background-color:#CCFFCC; margin:30px;">
  <form  name="form1" action="login_act.php" method="post">
  <ul>
    <li>
    ユーザーID:<input type="text" name="lid" required>
    </li>
    <li>
    ユーザーPW:<input type="password" name="lpw" required>
    </li>
    <li>
    <input type="submit" value="ログイン">
    </li>
  </ul>
  </form>
</div>

トレーナーの方は<a href="fb_login.php">こちら</a>


</body>
</html>