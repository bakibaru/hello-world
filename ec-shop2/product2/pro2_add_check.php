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

require_once('../common2/common2.php');

$post = sanitize($_POST);
$pro2_name = $post['name'];
$pro2_price = $post['price'];
$pro2_gazou = $_FILES['gazou'];

if ($pro2_name == '')
{
      print '商品名が入力されていません。<br />';
}
else
{
      print '商品名：';
      print $pro2_name;
      print '<br />';
}

if (preg_match('/\A[0-9]+\z/', $pro2_price) == 0)
{
      print '価格をしっかり入力してください。<br />';
}
else
{
      print '価格：';
      print $pro2_price;
      print '円<br />';
}

if ($pro2_gazou['size'] > 0)
{
     if ($pro2_gazou['size'] > 1000000)
     {
              print '画像が大き過ぎます';
     }
     else
     {
              move_uploaded_file($pro2_gazou['tmp_name'], './gazou/'.$pro2_gazou['name']);
              print '<img src="./gazou/'.$pro2_gazou['name'].'">';
              print '<br />';
     }
}

if ($pro2_name == '' || preg_match('/\A[0-9]+\z/', $pro2_price) == 0 || $pro2_gazou['size'] > 1000000)
{
      print '<form>';
      print '<input type="button" onclick="history.back()" value="戻る">';
      print '</form>';
}
else
{
      print '上記の商品を追加です。<br />';
      print '<form method="post" action="pro2_add_done.php">';
      print '<input type="hidden" name="name" value="'.$pro2_name.'">';
      print '<input type="hidden" name="price" value="'.$pro2_price.'">';
      print '<input type="hidden" name="gazou_name" value="'.$pro2_gazou['name'].'">';
      print '<br />';
      print '<input type="button" onclick="history.back()" value="戻る">';
      print '<input type="submit" value="OK">';
      print '</form>';
}

?>

</body>
</html>
