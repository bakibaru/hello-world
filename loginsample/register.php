<?php
  session_start();
  require_once("function.php");
  $_SESSION['token'] = get_csrf_token();
  header("Content-type: text/html; charset=utf-8");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
   <meta charset="UTF-8">
</head>
  <body>
  <h1>登録画面</h1>

  <?php
  if ($_SESSION["error_status"] == 2) {
    echo "<h2 style='color:red'>不正なリクエストです。</h2>";
  }
  if ($_SESSION["error_status"] == 5) {
   echo "<h2 style='color:red'>入力されてない項目があります。</h2>";
  }
  if ($_SESSION["error_status"] == 6) {
   echo "<h2 style='color:red'>パスワードが一致しません。</h2>";
  }
  $_SESSION["error_status"] = 0;
  ?>

  <form action="register_check.php" method="post">
  <table>
    <tr>
      <td>メールアドレス </td>
      <td><input type="text" name="email"></td>
    </tr>
    <tr>
      <td>パスワード</td>
      <td><input type="password" name="password" id="password" onkeyup="setMessage(this.value);"></td>
      <td><div id="pass_message"></div></td>
    </tr>
    <tr>
      <td>パスワード（確認）</td>
      <td><input type="password" name="confirm_password" id="confirm_password" onkeyup="setConfirmMessage(this.value);"></td>
    </tr>
  </table>

  <input type="hidden" name="token" value="<?php echo htmlspecialchars($_SESSION['token'], ENT_QUOTES, "UTF-8") ?>">
  <input type="submit" value="登録">
  <input type="reset" value="リセット">
  <input type="button" value="戻る" onclick="document.location.href='login.php';">

  </form>

  </body>
</html>
