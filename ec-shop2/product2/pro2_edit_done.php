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

require_once('../common2/common2.php');

$post = sanitize($_POST);
$pro2_code = $post['code'];
$pro2_name = $post['name'];
$pro2_price = $post['price'];
$pro2_gazou_name_old = $post['gazou_name_old'];
$pro2_gazou_name = $post['gazou_name'];

$dsn = 'mysql:dbname=shop2; host=localhost; charset=utf8';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'UPDATE mst_product2 SET name=?, price=?, gazou=? WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $pro2_name;
$data[] = $pro2_price;
$data[] = $pro2_gazou_name;
$data[] = $pro2_code;
$stmt->execute($data);

$dbh = null;

if ($pro2_gazou_name_old != $pro2_gazou_name)
{
      if ($pro2_gazou_name_old != '')
      {
            unlink('./gazou/'.$pro2_gazou_name_old);
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

<a href="pro2_list.php">戻る</a>

</body>
</html>
