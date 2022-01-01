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

$pro2_code = $_GET['procode'];

if (isset($_SESSION['cart']) == true)
{
       $cart = $_SESSION['cart'];
       $kazu = $_SESSION['kazu'];
       if (in_array($pro2_code, $cart) == true)
       {
                print 'その商品は既にカートに入っています。<br />';
                print '<a href="shop2_list.php">商品一覧に戻る</a>';
                exit();
       }
}
$cart[] = $pro2_code;
$kazu[] = 1;
$_SESSION['cart'] = $cart;
$_SESSION['kazu'] = $kazu;

}
catch (Exception $e)
{
      print '只今障害が発生し、皆様に大変ご迷惑をお掛けしております。';
      exit();
}

?>

カートに追加しました。<br />
<br />
<a href="shop2_list.php">商品一覧に戻る</a>

</body>
</html>
