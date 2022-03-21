<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>EC Shop6</title>
<link rel="shortcut icon" href="img6/favicon.ico">
</head>
<body>

<?php

try
{

require('../common6/common6.php');

$post = sanitize($_POST);
$pro6_name = $post['name'];
$pro6_price = $post['price'];
$pro6_gazou_name = $post['gazou_name'];

$dsn = 'mysql:dbname=ecshop6; host=localhost; charset=utf8';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'INSERT INTO mst_product6(name, price, gazou) VALUES (?, ?, ?)';
$stmt = $dbh->prepare($sql);
$data[] = $pro6_name;
$data[] = $pro6_price;
$data[] = $pro6_gazou_name;
$stmt->execute($data);

$dbh = null;

print $pro6_name;
print 'を追加しました。<br/ >';

}
catch (Exception $e)
{
      print '只今障害が発生し、皆様に大変ご迷惑をお掛けしております。';
      exit();
}

?>

<a href="pro6_list.php">戻る</a>

</body>
</html>
