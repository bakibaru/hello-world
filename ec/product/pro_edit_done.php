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

require('../common/common.php');

$post = sanitize($_POST);
$pro_code = $post['code'];
$pro_name = $post['name'];
$pro_price = $post['price'];
$pro_gazou_name_old = $post['gazou_name_old'];
$pro_gazou_name = $post['gazou_name'];

$dsn = 'mysql:dbname=ecshop; host=localhost; charset=utf8';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'UPDATE mst_product SET name=?, price=?, gazou=? WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $pro_name;
$data[] = $pro_price;
$data[] = $pro_gazou_name;
$data[] = $pro_code;
$stmt->execute($data);

$dbh = null;

if ($pro_gazou_name_old != $pro_gazou_name)
{
      if ($pro_gazou_name_old != '')
      {
            unlink('./gazou/'.$pro_gazou_name_old);
      }
}

print '修正しました。<br/ >';

}
catch (Exception $e)
{
      print '只今障害が発生し、皆様に大変ご迷惑をお掛けしております。';
      exit();
}

?>

<a href="pro_list.php">戻る</a>

</body>
</html>
