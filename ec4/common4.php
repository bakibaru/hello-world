<?php
session_start();

function connect() {
  return new PDO("mysql:dbname=ecshop4", "root");
}

?>
