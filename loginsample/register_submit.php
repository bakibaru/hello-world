<?php
  require_once("function.php");
  session_start();
  $email = $_POST['email'];
  $password = $_POST['password'];
  $token = $_POST['token'];
  if ($_SESSION['token'] != $_POST['token']) {
    $_SESSION = array();
    session_destroy();
    session_start();
    $_SESSION["error_status"] = 2;
    redirect_to_register();
    exit();
  }

  try {
    $pdo = new PDO(DNS, USER_NAME, PASSWORD, get_pdo_options());
    $sql = "INSERT INTO users (email, password) values (?, ?);";
    $stmt = $pdo->prepare($sql);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $pdo->beginTransaction();
    try {
      $stmt->bindValue(1, $email, PDO::PARAM_STR);
      $stmt->bindValue(2, $hashed_password, PDO::PARAM_STR);
      $stmt->execute();
      $pdo->commit();
    } catch (PDOException $e) {
      $pdo->rollBack();
      throw $e;
    }
  } catch (PDOException $e) {
    die($e->getMessage());
  }
  header("Content-type: text/html; charset=utf-8");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
</head>
<body>

<h1>登録完了</h1>
登録が完了しました。<br>
<br><br>
<a href="login.php">ログイン画面に戻る</a>

</body>
</html>
