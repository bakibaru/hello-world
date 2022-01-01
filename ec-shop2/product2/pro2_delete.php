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

$sql = 'SELECT name, gazou FROM mst_product2 WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $pro2_code;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$pro2_name = $rec['name'];
$pro2_gazou_name = $rec['gazou'];

$dbh = null;

if ($pro2_gazou_name == '')
{
       $disp_gazou = '';
}
else
{
       $disp_gazou = '<img src="./gazou/'.$pro2_gazou_name.'">';
}

}
catch (Exception $e)
{
      print '只今障害が発生し、皆様に大変ご迷惑をお掛けしております。';
      exit();
}

?>

商品削除<br />
<br />
商品コード<br />
<?php print $pro2_code;?>
<br />
商品名<br />
<?php print $pro2_name;?>
<br />
<?php print $disp_gazou;?>
<br />
この商品を削除してよろしいですか？<br />
<br />
<form method="post" action="pro2_delete_done.php">
<input type="hidden" name="code" value="<?php print $pro2_code;?>">
<input type="hidden" name="gazou_name" value="<?php print $pro2_gazou_name;?>">
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>

</body>
</html>
