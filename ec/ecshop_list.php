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

$dsn = 'mysql:dbname=ecshop; host=localhost; charset=utf8';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT code, name, price FROM mst_product WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

$dbh = null;

print '商品一覧表<br /><br/ >';

while (true)
{
      $rec = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($rec == false)
      {
                  break;
      }
      print $rec['name'].'------';
      print $rec['price'].'円';
      print '<br />';
}

}
catch (Exception $e)
{
      print '只今障害が発生し、皆様に大変ご迷惑をお掛けしております。';
      exit();
}

?>

<br />
<a href="ecshop.html">トップへ戻る</a>

</body>
</html>
