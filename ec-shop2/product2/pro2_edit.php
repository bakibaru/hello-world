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

$pro2_code = $_GET['procode'];

$dsn = 'mysql:dbname=shop2; host=localhost; charset=utf8';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT name, price, gazou FROM mst_product2 WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $pro2_code;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$pro2_name = $rec['name'];
$pro2_price = $rec['price'];
$pro2_gazou_name_old = $rec['gazou'];

$dbh = null;

if ($pro2_gazou_name_old == '')
{
       $disp_gazou = '';
}
else
{
       $disp_gazou = '<img src=".gazou/'.$pro2_gazou_name_old.'">';
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
<?php print $pro2_code;?>
<br />
<br />
<form method="post" action="pro2_edit_check.php" enctype="multipart/form-data">
<input type="hidden" name="code" value="<?php print $pro2_code;?>">
<input type="hidden" name="gazou_name_old" value="<?php print $pro2_gazou_name_old;?>">
商品名<br />
<input type="text" name="name" style="width:250px" value="<?php print $pro2_name;?>"><br />
価格<br />
<input type="text" name="price" style="width:80px" value="<?php print $pro2_price;?>">円<br />
<br />
<?php print $disp_gazou;?>
<br />
画像を選んでください。<br/ >
<input type="file" name="gazou" style="width:400px"><br />
<br />
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>

</body>
</html>
