<?php
  session_start();
  require_once("function.php");
  $_SESSION['token'] = get_csrf_token();
  header("Content-type: text/html; charset=utf-8");
?>

<!DOCTYPE html>
<html lang="ja">
<body>
  <h1>ログイン</h1>

  <?php
  if ($_SESSION["error_status"] == 1) {
    echo "<h2 style='color:red'>メールアドレスまたはパスワードが異なります。</h2>";
  }
   if ($_SESSION["error_status"] == 2) {
    echo "<h2 style='color:red'>不正なリクエストです。</h2>";
  }
  if ($_SESSION["error_status"] == 3) {
   echo "<h2 style='color:red'>アカウントがロックされました。時間を空けてから再度お試しください。</h2>";
  }
  $_SESSION["error_status"] = 0;
  ?>

  <form action="login_check.php" method="post">
  <table>
    <tr>
      <td>メールアドレス：</td>
      <td><input type="text" name="email"></td>
    </tr>
    <tr>
    <td>
      パスワード：
    </td>
    <td>
      <input type="password" name="password">
    </td>
    </tr>
   </table>

    <input type="hidden" name="token" value="<?php echo htmlspecialchars($_SESSION['token'], ENT_QUOTES, "UTF-8") ?>">
    <input type="submit" value="ログイン">
    <input type="reset" value="リセット">
  </form>
  <br>
  <a href="register.php">登録画面へ</a>

</body>
</html>
