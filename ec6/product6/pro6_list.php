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

$dsn = 'mysql:dbname=ecshop6; host=localhost; charset=utf8';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT code, name, price FROM mst_product6 WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

$dbh = null;

print '商品一覧<br /><br/ >';

print '<form method="post" action="pro6_branch.php">';
while (true)
{
      $rec = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($rec == false)
      {
                  break;
      }
      print '<input type="radio" name="procode" value="'.$rec['code'].'">';
      print $rec['name'].'---';
      print $rec['price'].'円';
      print '<br />';
}
print '<input type="submit" name="disp" value="参照">';
print '<input type="submit" name="add" value="追加">';
print '<input type="submit" name="edit" value="修正">';
print '<input type="submit" name="delete" value="削除">';
print '<br />';

}
catch (Exception $e)
{
      print '只今障害が発生し、皆様に大変ご迷惑をお掛けしております。';
      exit();
}

?>

</body>
</html>
