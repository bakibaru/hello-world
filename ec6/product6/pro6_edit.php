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

$pro6_code = $_GET['procode'];

$dsn = 'mysql:dbname=ecshop6; host=localhost; charset=utf8';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT name, price, gazou FROM mst_product6 WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $pro6_code;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$pro6_name = $rec['name'];
$pro6_price = $rec['price'];
$pro6_gazou_name_old = $rec['gazou'];

$dbh = null;

if ($pro6_gazou_name_old == '')
{
       $disp_gazou = '';
}
else
{
       $disp_gazou = '<img src=".gazou/'.$pro6_gazou_name_old.'">';
}

}
catch (Exception $e)
{
      print '只今障害が発生し、皆様に大変ご迷惑をお掛けしております。';
      exit();
}

?>

商品修正<br />
<br />
商品コード<br />
<?php print $pro6_code;?>
<br />
<br />
<form method="post" action="pro6_edit_check.php" enctype="multipart/form-data">
<input type="hidden" name="code" value="<?php print $pro6_code;?>">
<input type="hidden" name="gazou_name_old" value="<?php print $pro6_gazou_name_old;?>">
商品名<br />
<input type="text" name="name" style="width:220px" value="<?php print $pro6_name;?>"><br />
価格<br />
<input type="text" name="price" style="width:70px" value="<?php print $pro6_price;?>">円<br />
<br />
画像を選んでください。<br/ >
<input type="file" name="gazou" style="width:500px"><br />
<br />
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>

</body>
</html>
