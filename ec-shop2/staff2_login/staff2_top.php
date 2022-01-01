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

ショップ管理トップ一覧<br/ >
<br />
<a href="../staff2/staff2_list.php">店員管理</a><br />
<br />
<a href="../product2/pro2_list.php">商品管理</a><br />
<br />
<a href="staff2_logout.php">ログアウト</a><br />

</body>
</html>
