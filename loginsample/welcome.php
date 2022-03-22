<?php
  require_once("function.php");
  session_start();
  header("Content-type: text/html; charset=utf-8");
  if (!isset($_SESSION['email'])){
    $_SESSION["error_status"] = 2;
    redirect_to_login();
    exit();
  }
?>

<html>
<body>
  <h1>ようこそ</h1>

  <?php
  if ($_SESSION["error_status"] == 2) {
    echo "<h2 style='color:red'>不正なリクエストです。</h2>";
  }
  $_SESSION["error_status"] = 0;
  ?>

  <form action="logout.php" method="post">
    <input type="hidden" name="token" value="<?php echo htmlspecialchars($_SESSION['token']  , ENT_QUOTES, "UTF-8") ?>">
    <input type="submit" name="logout" value="ログアウト">
  </form>

</body>
</html>
