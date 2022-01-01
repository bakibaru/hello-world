<?php
    session_start();
    session_regenerate_id(true);
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

$onamae = $post['onamae'];
$postal1 = $post['postal1'];
$postal2 = $post['postal2'];
$address = $post['address'];
$tel = $post['tel'];

print $onamae.'様<br />';
print 'ご注文ありがとうございました。<br />';
print '以下の住所をご確認させていただきます。<br />';
print $postal1.'-'.$postal2.'<br />';
print $address.'<br />';
print $tel.'<br />';

}
catch (Exception $e)
{
      print 'ただいま障害により大変ご迷惑をお掛けしております。';
      exit();
}

?>

<br />
<a href="shop2_list.php">商品画面へ</a>

</body>
</html>
