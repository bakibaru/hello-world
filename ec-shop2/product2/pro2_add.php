<?php
session_start();
session_regenerate_id(true);
if (isset($_SESSION['login']) == false)
{
       print 'ログインされていません。<br />';
       print '<a href="../staff2_login/staff2_login.html">ログイン画面へ</a>';
       exit();
}
else
{
       print $_SESSION['staff2_name'];
       print 'さんログイン中<br />';
       print '<br />';
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>スーパーマーケット</title>
</head>
<body>

商品追加<br />
<br />
<form method="post" action="pro2_add_check.php" enctype="multipart/form-data">
商品名<br />
<input type="text" name="name" style="width:250px"><br />
<br />
価格<br />
<input type="text" name="price" style="width:80px"><br />
<br />
画像選択<br />
<input type="file" name="gazou" style="width:400px"><br />
<br />
<br />
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>

</body>
</html>
