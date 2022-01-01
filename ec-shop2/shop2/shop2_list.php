<?php
session_start();
session_regenerate_id(true);
print 'ようこそゲスト様<br />';
print '<br />';
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

$dsn = 'mysql:dbname=shop2; host=localhost; charset=utf8';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT code, name, price FROM mst_product2 WHERE 1';
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
      print '<a href="shop2_product2.php?procode='.$rec['code'].'">';
      print $rec['name'].'---';
      print $rec['price'].'円';
      print '</a>';
      print '<br />';
}
print '<br />';
print '<a href="shop2_cartlook.php">カートを見る</a><br />';

}
catch (Exception $e)
{
      print '只今障害が発生し、皆様に大変ご迷惑をお掛けしております。';
      exit();
}

?>

</body>
</html>
