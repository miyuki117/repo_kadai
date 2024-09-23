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
  <title>USERデータ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
    <?php echo $_SESSION["name"]; ?>さま
    <?php include("menu1.php"); ?>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<?= include ("form_user.php"); ?>
<!-- Main[End] -->


</body>
</html>
