<?php
  require_once("function.php");
  session_start();
  header("Content-type: text/html; charset=utf-8");
  $email = $_POST['email'];
  $password = $_POST["password"];
  $confirm_password = $_POST["confirm_password"];
  $token = $_POST['token'];
  if ($token != $_SESSION['token']) {
    $_SESSION = array();
    session_destroy();
    session_start();
    $_SESSION["error_status"] = 2;
    redirect_to_register();
    exit();
  }
  if (empty($email) || empty($password) || empty($confirm_password)) {
    $_SESSION["error_status"] = 5;
    redirect_to_register();
    exit();
  }
  if ($password != $confirm_password) {
    $_SESSION["error_status"] = 6;
    redirect_to_register();
    exit();
  }
?>

<!DOCTYPE html>
<head>
  <meta charset="utf-8">
</head>

<html lang="ja">
<body>
  <h1>確認画面</h1>
  <h2>登録しますか？</h2>

  <form action="register_submit.php" method="post">
    <table>
     <tr>
        <td>メールアドレス</td>
        <td><?php echo htmlspecialchars($email, ENT_QUOTES, "UTF-8") ?></td>
      </tr>
    </table>

    <input type="hidden" name="email" value="<?php echo htmlspecialchars($email  , ENT_QUOTES, "UTF-8") ?>">
    <input type="hidden" name="password" value="<?php echo htmlspecialchars($password  , ENT_QUOTES, "UTF-8") ?>">
    <input type="hidden" name="token" value="<?php echo htmlspecialchars($_SESSION['token']  , ENT_QUOTES, "UTF-8") ?>">
    <input type="submit" value="登録">
    <input type="button" value="戻る" onclick="history.back();">

  </form>

</body>
</html>
