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

if (isset($_SESSION['cart']) == true)
{
      $cart = $_SESSION['cart'];
      $kazu = $_SESSION['kazu'];
      $max = count($cart);
}
else
{
      $max = 0;
}

if ($max == 0)
{
      print 'カートに商品が入っていません。<br />';
      print '<br />';
      print '<a href="shop2_list.php">商品一覧へ戻る</a>';
      exit();
}

$dsn = 'mysql:dbname=shop2; host=localhost; charset=utf8';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

foreach ($cart as $key => $val)
{
      $sql = 'SELECT code, name, price, gazou FROM mst_product2 WHERE code=?';
      $stmt = $dbh->prepare($sql);
      $data[0] = $val;
      $stmt->execute($data);

      $rec = $stmt->fetch(PDO::FETCH_ASSOC);

      $pro2_name[] = $rec['name'];
      $pro2_price[] = $rec['price'];
      if ($rec['gazou'] == '')
      {
                  $pro2_gazou[] = '';
      }
      else
      {
                  $pro2_gazou[] = '<img src="../product2/gazou/'.$rec['gazou'].'">';
      }
}
$dbh = null;

}
catch (Exception $e)
{
      print '只今障害が発生し、皆様に大変ご迷惑をお掛けしております。';
      exit();
}

?>

カートの中身<br />
<br />
<form method="post" action="shop2_kazu_change.php">
<table border="1">
<tr>
<td>商品</td>
<td>商品画像</td>
<td>価格</td>
<td>数量</td>
<td>小計</td>
<td>削除</td>
</tr>
<?php for ($i = 0; $i < $max; $i++)
    {
?>
<tr>
    <td><?php  print $pro2_name[$i];?></td>
    <td><?php  print $pro2_gazou[$i];?></td>
    <td><?php  print $pro2_price[$i];?>円</td>
    <td><input type="text" name="kazu<?php print $i;?>" value="<?php print $kazu[$i];?>"></td>
    <td><?php  print $pro2_price[$i] * $kazu[$i];?>円</td>
    <td><input type="checkbox" name="sakujo<?php print $i;?>"></td>
</tr>
<?php
    }
?>
</table>
<input type="hidden" name="max" value="<?php print $max;?>">
<input type="submit" value="数量変更"><br />
<input type="button" onclick="history.back()" value="戻る">
</form>
<br />
<a href="shop2_form.html">ご購入手続きへ進む</a><br />


</body>
</html>
