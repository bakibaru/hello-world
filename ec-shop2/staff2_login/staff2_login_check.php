<?php

try
{

require_once('../common2/common2.php');

$post = sanitize($_POST);
$staff2_code = $post['code'];
$staff2_pass = $post['pass'];

$staff2_pass = md5($staff2_pass);

$dsn = 'mysql:dbname=shop2; host=localhost; charset=utf8';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT name FROM mst_staff2 WHERE code=? AND password=?';
$stmt = $dbh->prepare($sql);
$data[] = $staff2_code;
$data[] = $staff2_pass;
$stmt->execute($data);

$dsn = null;

$rec = $stmt->fetch(PDO::FETCH_ASSOC);

if ($rec == false)
{
      print 'スタッフコードかパスワードが間違っています。<br />';
      print '<a href="staff2_login.html">戻る</a>';
}
else
{
      session_start();
      $_SESSION['login'] = 1;
      $_SESSION['staff2_code'] = $staff2_code;
      $_SESSION['staff2_name'] = $rec['name'];
      header('Location:staff2_top.php');
      exit();
}

}
catch (Exception $e)
{
      print 'ただいま障害により大変ご迷惑をお掛けしております。';
      exit();
}

?>
