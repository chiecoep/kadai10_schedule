<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <title>mamabi</title>
</head>

<body>

    <h2>mamabi 登録フォーム</h2>

    <form method="POST" action="insert.php" enctype="multipart/form-data">
        <!-- <div class="jumbotron"> -->
        <fieldset>
            <legend><strong>登録フォーム</strong></legend>
            <table class="formTable">
          <tr>
          <tr></tr>
            <th>日程</th>
            <td><input type="date" name="day" size="30"></td>
          </tr>

          <tr>
            <th>場所（市区町村まで）</th>
            <td><input type="text" name="address01"  size="30"></td>
          </tr>
  
          <tr>
            <th>場所（市区町村以下）</th>
            <td><input type="text" name="address02"  size="30"></td>
          </tr>

          <tr>
            <th>見出し</th>
            <td><input type="text" name="title"  size="30"></td>
          </tr>

          <tr>
            <th>詳細<br /></th>
            <td><textarea name="naiyou" rows="5" cols="32"></textarea></td>
          </tr>

          <tr>
            <th>名前<br /></th>
            <td><input type="text" name="name"  size="30"></td>
          </tr>

        </table>
            <input type="submit" value="　登録　">
            </fieldset>
        </div>
    </form>
  
  <h3>
  <button onclick="location.href='list.php'" class="linkds">検索ページ</button>
  </h3>

</body>
</html>
