<?php
//1.  DB接続します
include("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM gs_kadai09 ORDER BY indate DESC LIMIT 1";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute(); //true or folse

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>mamabi</title>
<link rel="stylesheet" href="stylesheet.css">

</head>

<body>
<h3>登録完了しました</h3>
<div class="card-container">
<?php foreach($values as $value){ ?>
    <div class="card">
        <p><strong><?=$value["day"]?> / <?=$value["address01"]?></strong></p>
        <p><strong><?=$value["title"]?></strong></p>
        <p><span class="small-font01"><?=$value["naiyou"]?></span></p>
        <p><span class="small-font01"><?=$value["address01"]?><?=$value["address02"]?></span></p>
        <p><span class="small-font02"><?=$value["name"]?>  <?=$value["indate"]?></span></p>
    </div>
<?php } ?>
</div>
<h3>
<a href="detail.php" class="linkds">修正する</a>  /  
<a href="list.php" class="linkds">検索する</a>
</h3>

</body>
</html>

