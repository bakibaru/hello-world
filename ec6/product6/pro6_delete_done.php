<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>EC Shop</title>
<link rel="shortcut icon" href="img/favicon.ico">
</head>
<body>

<?php

try
{

$pro6_code = $_POST['procode'];
$pro6_gazou_name = $_POST['gazou_name'];

$dsn = 'mysql:dbname=ecshop6; host=localhost; charset=utf8';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'DELETE FROM mst_product6 WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $pro6_code;
$stmt->execute($data);

$dbh = null;

if ($pro6_gazou_name != '')
{
      unlink('./gazou/'.$pro6_gazou_name);
}

}
catch (Exception $e)
{
      print '只今障害が発生し、皆様に大変ご迷惑をお掛けしております。';
      exit();
}

?>

削除しました。<br />
<br />
<a href="pro6_list.php">戻る</a>

</body>
</html>
