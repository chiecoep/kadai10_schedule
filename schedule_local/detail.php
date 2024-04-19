<?php
$id = $_GET["id"];

//１．PHP
include("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM gs_kadai09 WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id , PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$v    =  $stmt->fetch(); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
// $json = json_encode($values,JSON_UNESCAPED_UNICODE);
?>
<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
理由：入力項目は「登録/更新」はほぼ同じになるからです。
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <link href="stylesheet.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="update.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$v["id"]?>">
        <!-- <div class="jumbotron"> -->
        <fieldset>
            <legend><strong>更新フォーム</strong></legend>
            <table class="formTable">
          <tr>
          <tr></tr>
            <th>日程</th>
            <td><input type="date" name="day" size="30" value="<?=$v["day"]?>"></td>
          </tr>

          <tr>
            <th>場所（市区町村まで）</th>
            <td><input type="text" name="address01"  size="30" value="<?=$v["address01"]?>"></td>
          </tr>
  
          <tr>
            <th>場所（市区町村以下）</th>
            <td><input type="text" name="address02"  size="30" value="<?=$v["address02"]?>"></td>
          </tr>

          <tr>
            <th>見出し</th>
            <td><input type="text" name="title"  size="30" value="<?=$v["title"]?>"></td>
          </tr>

          <tr>
            <th>詳細<br /></th>
            <td><textarea name="naiyou" rows="5" cols="32"><?=$v["naiyou"]?></textarea></td>
          </tr>

          <tr>
            <th>名前<br /></th>
            <td><input type="text" name="name"  size="30" value="<?=$v["name"]?>"></td>
          </tr>

        </table>
            <input type="submit" value="　更新　">
            </fieldset>
        </div>
    </form>
<!-- Main[End] -->
<div class="header">
<button onclick="location.href='list.php'" class="linkds">戻る</button>
</div>

</body>
</html>



