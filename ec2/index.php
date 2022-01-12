<?php
require 'common.php';
$pdo = connect();
$st = $pdo->query("SELECT * FROM goods");
$goods = $st->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>RAMEN Shop</title>
<link rel="stylesheet" href="shop.css">
</head>
<body>

<h1>RAMEN Shop</h1>

<table>
  <?php foreach ($goods as $g) { ?>
    <tr>
      <td>
        <?php echo img_tag($g['code']) ?></p>
      </td>
      <td>
        <p class="goods"><?php echo $g['name'] ?></p>
        <p><?php echo nl2br($g['comment']) ?></p>
      </td>
      <td width="100">
        <p><?php echo $g['price'] ?>円</p>
        <form method="post" action="#">
          <select name="num">
            <?php
              for ($i = 0; $i <= 10; $i++) {
                echo "<option>$i</option>";
              }
            ?>
          </select>
          <input type="hidden" name="code" value="<?php echo $g['code'] ?>">
          <input type="submit" name="submit" value="購入">
        </form>
      </td>
    </tr>
  <?php } ?>
</table>

</body>
</html>
