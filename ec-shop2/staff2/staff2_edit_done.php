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

try
{

require_once('../common2/common2.php');

$post = sanitize($_POST);
$staff2_code = $post['code'];
$staff2_name = $post['name'];
$staff2_pass = $post['pass'];

$dsn = 'mysql:dbname=shop2; host=localhost; charset=utf8';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'UPDATE mst_staff2 SET name=?, password=? WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $staff2_name;
$data[] = $staff2_pass;
$data[] = $staff2_code;
$stmt->execute($data);

$dbh = null;

}
catch (Exception $e)
{
     print '只今障害が発生し、皆様に大変ご迷惑をお掛けしております。';
     exit();
}

?>

店員の修正をしました。<br />
<br />
<a href="staff2_list.php">戻る</a>

</body>
</html>
