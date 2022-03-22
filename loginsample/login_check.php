<?php
  session_start();
  require_once("function.php");

  $email = $_POST['email'];
  $password = $_POST['password'];
  $token = $_POST['token'];

  if ($token != $_SESSION['token']) {
    $_SESSION = array();
    session_destroy();
    session_start();
    $_SESSION["error_status"] = 2;
    redirect_to_login();
    exit();
  }

  try {
    $pdo = new PDO(DNS, USER_NAME, PASSWORD, get_pdo_options());

    $rows = login_get_user_rows($email, $pdo);

    if (count($rows) > 0 && !empty($rows[0]['locked_time'])) {
      $lock_time_diff = strtotime('now') - strtotime($rows[0]['locked_time']);
      if ($lock_time_diff < LOGIN_LOCK_PERIOD) {
        $_SESSION["error_status"] = 3;
        redirect_to_login();
        exit();
      } else {
        unlock_login_account($email, $pdo);
      }
    }

    if (count($rows) == 0) {
      $_SESSION["error_status"] = 1;
      redirect_to_login();
      exit();
    }
    if (!password_verify($password, $rows[0]['password'])) {
      login_failed_count_up($email, $pdo);
      $count = get_login_failed_count($email, $pdo);
      if ($count >= LOGIN_FAILED_LIMIT) {
        lock_login_account($email, $pdo);
        $_SESSION["error_status"] = 3;
        redirect_to_login();
        exit();
      }

      $_SESSION["error_status"] = 1;
      redirect_to_login();
      exit();
    }

    unlock_login_account($email, $pdo);
    session_regenerate_id(true);
    $_SESSION['email'] = $rows[0]['email'];
    redirect_to_welcome();
    exit();
  } catch (PDOException $e) {
    die($e->getMessage());
  }

function login_get_user_rows($email, $pdo) {
  $sql = "SELECT * FROM users WHERE email = ?;";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(1, $email, PDO::PARAM_STR);
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function login_failed_count_up($email, $pdo) {
  $sql = "UPDATE users SET failed_count = failed_count + 1 WHERE email = ?;";
  $stmt = $pdo->prepare($sql);
  $pdo->beginTransaction();
  try {
    $stmt->bindValue(1, $email, PDO::PARAM_STR);
    $stmt->execute();
    $pdo->commit();
  } catch (PDOException $e) {
    $pdo->rollBack();
    throw $e;
  }
}

function get_login_failed_count($email, $pdo) {
  $sql = "SELECT failed_count FROM users WHERE email = ?;";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(1, $email, PDO::PARAM_STR);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  if (!empty($row)) {
    return $row['failed_count'];
  }
  return 0;
}

function lock_login_account($email, $pdo) {
  $sql = "UPDATE users SET locked_time = ? WHERE email = ?;";
  $stmt = $pdo->prepare($sql);
  $pdo->beginTransaction();
  try {
    $stmt->bindValue(1, date('Y-m-d H:i:s'), PDO::PARAM_STR);
    $stmt->bindValue(2, $email, PDO::PARAM_STR);
    $stmt->execute();
    $pdo->commit();
  } catch (PDOException $e) {
    $pdo->rollBack();
    throw $e;
  }
}

function unlock_login_account($email, $pdo) {
  $sql = "UPDATE users SET failed_count = 0, locked_time = NULL WHERE email = ?;";
  $stmt = $pdo->prepare($sql);
  $pdo->beginTransaction();
  try {
    $stmt->bindValue(1, $email, PDO::PARAM_STR);
    $stmt->execute();
    $pdo->commit();
  } catch (PDOException $e) {
    $pdo->rollBack();
    throw $e;
  }
}

?>
