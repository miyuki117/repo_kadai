<?php
//1. POSTデータ取得
$id = $_POST["id"];
$fb_flg = 1;


//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成
// テーブルを更新する
$sql ="UPDATE fb_table SET fb_flg=:fb_flg WHERE id=:id"; //WHEREつけないと全部消える
$sql = "INSERT INTO fb_table(fb_flg,id)VALUES(:fb_flg,:id)";

$stmt = $pdo->prepare($sql);
$stmt->bindValue('id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue('fb_flg', $fb_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
  redirect("training_list.php");
}
