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
$pro6_gazou_name = $rec['gazou'];

$dbh = null;


if ($pro6_gazou_name == '')
{
       $disp_gazou = '';
}
else
{
       $disp_gazou = '<img src="./gazou/'.$pro6_gazou_name.'">';
}

}
catch (Exception $e)
{
      print '只今障害が発生し、皆様に大変ご迷惑をお掛けしております。';
      exit();
}

?>

商品情報参照<br />
<br />
商品コード<br />
<?php print $pro6_code;?>
<br />
商品名<br />
<?php print $pro6_name;?>
<br />
価格<br />
<?php print $pro6_price;?>円
<br />
<?php print $disp_gazou;?>
<br />
<br />
<form>
<input type="button" onclick="history.back()" value="戻る">
</form>

</body>
</html>
