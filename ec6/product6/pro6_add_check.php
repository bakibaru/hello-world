<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>EC Shop6</title>
<link rel="shortcut icon" href="img6/favicon.ico">
</head>
<body>

<?php

require('../common6/common6.php');

$post = sanitize($_POST);
$pro6_name = $post['name'];
$pro6_price = $post['price'];
$pro6_gazou = $_FILES['gazou'];

if ($pro6_name == '')
{
      print '商品名が入力されていません。<br />';
}
else
{
      print '商品名：';
      print $pro6_name;
      print '<br />';
}

if (preg_match('/\A[0-9]+\z/', $pro6_price) == 0)
{
      print '価格をきちんと入力してください。<br />';
}
else
{
      print '価格：';
      print $pro6_price;
      print '円<br />';
}

if ($pro6_gazou['size'] > 0)
{
     if ($pro6_gazou['size'] > 1000000)
     {
              print '画像が大き過ぎます';
     }
     else
     {
              move_uploaded_file($pro6_gazou['tmp_name'], './gazou/'.$pro6_gazou['name']);
              print '<img src="./gazou/'.$pro6_gazou['name'].'">';
              print '<br />';
     }
}

if ($pro6_name == '' || preg_match('/\A[0-9]+\z/', $pro6_price) == 0 || $pro6_gazou['size'] > 1000000)
{
      print '<form>';
      print '<input type="button" onclick="history.back()" value="戻る">';
      print '</form>';
}
else
{
      print '上記の商品を追加します。<br />';
      print '<form method="post" action="pro6_add_done.php">';
      print '<input type="hidden" name="name" value="'.$pro6_name.'">';
      print '<input type="hidden" name="price" value="'.$pro6_price.'">';
      print '<input type="hidden" name="gazou_name" value="'.$pro6_gazou['name'].'">';
      print '<br />';
      print '<input type="button" onclick="history.back()" value="戻る">';
      print '<input type="submit" value="OK">';
      print '</form>';
}

?>


</body>
</html>
