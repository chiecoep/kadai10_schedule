<?php
//1. POSTデータ取得
$id = $_GET["id"];

include("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM gs_kadai09 WHERE id=:id" ;
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id , PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
// $json = json_encode($values,JSON_UNESCAPED_UNICODE);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>mamabi</title>
<link href="stylesheet.css" rel="stylesheet">
</head>
<body id="main">

<div class="card-container">
<?php foreach($values as $value){ ?>
    <div class="card">
        <p><strong><?=$value["day"]?> / <?=$value["address01"]?></strong></p>
        <p><strong><?=$value["title"]?></strong></p>
        <p><span class="small-font01"><?=$value["naiyou"]?></span></p>
        <p><span class="small-font01"><?=$value["address01"]?><?=$value["address02"]?></span></p>
        <p><span class="small-font02"><?=$value["name"]?>  <?=$value["indate"]?></span></p>

        <td><a href="delete02.php?id=<?=h($value["id"])?>" class="linkds">削除する</a></td>
    </div>
<?php } ?>
</div>
<button onclick="location.href='list.php'" class="linkds">戻る</button>

<script>
  const a = '<?php echo $json; ?>';
  console.log(JSON.parse(a));
</script>
</body>
</html>
