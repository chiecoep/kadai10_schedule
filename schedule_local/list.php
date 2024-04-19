<?php
session_start();
//【重要】
//insert.phpを修正（関数化）してからselect.phpを開く！！
include("funcs.php");
sschk();
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM gs_kadai09";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
$json = json_encode($values,JSON_UNESCAPED_UNICODE);

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

<div class="header">
  <?php echo $_SESSION["name"]; ?>さん、こんにちは！
</div>

<div class="card-container">
  <?php foreach($values as $value){ ?>
      <div class="card">
          <p><strong><?=$value["day"]?> / <?=$value["address01"]?></strong></p>
          <p><strong><?=$value["title"]?></strong></p>
          <p><span class="small-font01"><?=$value["naiyou"]?></span></p>
          <p><span class="small-font01"><?=$value["address01"]?><?=$value["address02"]?></span></p>
          <p><span class="small-font02"><?=$value["name"]?>  <?=$value["indate"]?></span></p>
          <td><a href="list.php?id=<?=h($value["id"])?>" class="linkds">詳細</a></td>
          <?php if($_SESSION["kanri_flg"]=="1"){ ?>
          <td><a href="detail.php?id=<?=h($value["id"])?>" class="linkds">更新</a></td>
          <td><a href="delete.php?id=<?=h($value["id"])?>" class="linkds">削除</a></td>
          <?php } ?>
      </div>
  <?php } ?>
</div>

<p>
<button onclick="location.href='logout.php'" class="linkds">ログアウト</button>
</p>

<?php if($_SESSION["kanri_flg"]=="1"){ ?>
<div class="kanri">
<p>管理メニュー</p>
<p>
<button onclick="location.href='entry.php'" class="linkds">求人登録</button> / 
<button onclick="location.href='user.php'" class="linkds">ユーザー登録</button>
</p>
</div>
<?php } ?>

<script>
  const a = '<?php echo $json; ?>';
  console.log(JSON.parse(a));
</script>
</body>
</html>
