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

店員追加<br />
<br />
<form method="post" action="staff2_add_check.php">
店員名<br />
<input type="text" name="name" style="width:150px"><br />
<br />
パスワード入力<br />
<input type="password" name="pass" style="width:150px"><br />
<br />
パスワード再入力<br />
<input type="password" name="pass2" style="width:150px"><br />
<br />
<br />
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>

</body>
</html>
