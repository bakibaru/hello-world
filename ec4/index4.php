<?php
  require 'common4.php';
  $pdo = connect();
  $st = $pdo->query("SELECT * FROM ticket");
  $goods = $st->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>切符</title>
<link rel="stylesheet" href="style4.css">
</head>
<body>

<h1>切符</h1>

<table>
  <?php foreach ($ticket as $t) { ?>
    <tr>
      <td>
        <?php echo img_tag($t['code']) ?>
      </td>
      <td>
        <p class="ticket"><?php echo $t['name'] ?></p>
        <p><?php echo nl2br($t['comment']) ?></p>
      </td>
      <td width="100">
        <p><?php echo $t['price'] ?> 円</p>
        <form action="#" method="post">
          <select name="num">
            <?php
              for ($i = 0; $i <= 50; $i++) {
                echo "<option>$i</option>";
              }
            ?>
          </select>
          <input type="hidden" name="code" value="<?php echo $t['code'] ?>">
          <input type="submit" name="submit" value="購入">
        </form>
      </td>
    </tr>
  <?php } ?>
</table>
</body>
</html>
