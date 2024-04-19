<?php

//1. POSTデータ取得
$address01 = $_POST["address01"];
$address02 = $_POST["address02"];
$day = $_POST["day"];
$title = $_POST["title"];
$naiyou = $_POST["naiyou"];
$name = $_POST["name"];

//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成
$sql = "INSERT INTo gs_kadai09(address01,address02,day,title,naiyou,name,indate)VALUES(:address01,:address02,:day,:title,:naiyou,:name,sysdate());";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':address01', $address01, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':address02', $address02, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':day', $day, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':title', $title, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //true or false

//４．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
  redirect("insert02.php");
}
?>
