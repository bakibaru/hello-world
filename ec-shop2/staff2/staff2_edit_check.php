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

<?php

require_once('../common2/common2.php');

$post = sanitize($_POST);
$staff2_code = $post['code'];
$staff2_name = $post['name'];
$staff2_pass = $post['pass'];
$staff2_pass2 = $post['pass2'];

if ($staff2_name == '')
{
      print '店員名が入力されていません。<br />';
}
else
{
      print '店員名：';
      print $staff2_name;
      print '<br />';
}

if ($staff2_pass == '')
{
      print 'パスワードが入力されていません。<br />';
}

if ($staff2_pass != $staff2_pass2)
{
      print 'パスワードが間違っています。<br />';
}

if ($staff2_name == '' || $staff2_pass == '' || $staff2_pass != $staff2_pass2)
{
      print '<form>';
      print '<input type="button" onclick="history.back()" value="戻る">';
      print '</form>';
}
else
{
      $staff2_pass = md5($staff2_pass);
      print '<form method="post" action="staff2_edit_done.php">';
      print '<input type="hidden" name="code" value="'.$staff2_code.'">';
      print '<input type="hidden" name="name" value="'.$staff2_name.'">';
      print '<input type="hidden" name="pass" value="'.$staff2_pass.'">';
      print '<br />';
      print '<input type="button" onclick="history.back()" value="戻る">';
      print '<input type="submit" value="OK">';
      print '</form>';
}

?>

</body>
</html>
