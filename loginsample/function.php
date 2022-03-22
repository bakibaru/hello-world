<?php
define("DNS","mysql:host=mysql;dbname=loginsample;charset=utf8");
define("USER_NAME", "mysql");
define("PASSWORD", "Mysql@1234");
define("LOGIN_FAILED_LIMIT", 5);
define("LOGIN_LOCK_PERIOD", 30);

function get_csrf_token() {
    $TOKEN_LENGTH = 16;
    $bytes = openssl_random_pseudo_bytes($TOKEN_LENGTH);
    return bin2hex($bytes);
}

function get_pdo_options() {
    return array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                 PDO::MYSQL_ATTR_MULTI_STATEMENTS => false,
                 PDO::ATTR_EMULATE_PREPARES => false);
}

function redirect_to_login() {
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: login.php");
}

function redirect_to_register() {
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: register.php");
}

function redirect_to_welcome() {
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: welcome.php");
}
