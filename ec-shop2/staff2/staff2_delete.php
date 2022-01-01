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

$staff2_code = $_GET['staffcode'];

$dsn = 'mysql:dbname=shop2; host=localhost; charset=utf8';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT name FROM mst_staff2 WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $staff2_code;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$staff2_name = $rec['name'];

$dbh = null;

}
catch (Exception $e)
{
      print '只今障害が発生し、皆様に大変ご迷惑をお掛けしております。';
      exit();
}

?>

店員削除<br />
<br />
店員コード<br />
<?php print $staff2_code;?>
<br />
店員名<br />
<?php print $staff2_name;?>
<br />
この店員を削除してよろしいですか？<br />
<br />
<form method="post" action="staff2_delete_done.php">
<input type="hidden" name="code" value="<?php print $staff2_code;?>">
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>

</body>
</html>
