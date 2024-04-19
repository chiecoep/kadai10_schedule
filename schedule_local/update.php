<?php
//1. POSTデータ取得
$address01 = $_POST["address01"];
$address02 = $_POST["address02"];
$day = $_POST["day"];
$title = $_POST["title"];
$naiyou = $_POST["naiyou"];
$name = $_POST["name"];
$id     = $_POST["id"];

//2. DB接続します
//*** function化する！  *****************
include("funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成
$sql = "UPDATE gs_kadai09 SET address01=:address01,address02=:address02,day=:day,title=:title,naiyou=:naiyou,name=:name WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':address01', $address01, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':address02', $address02, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':day', $day, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':title', $title, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id',     $id,     PDO::PARAM_INT);
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    sql_error($stmt);
}else{
    //*** function化する！*****************
    redirect("list.php");
}

?>
