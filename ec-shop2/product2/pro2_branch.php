<?php

session_start();
session_regenerate_id(true);
if (isset($_SESSION['login']) == false)
{
       print 'ログインされていません。<br />';
       print '<a href="../staff2_login/staff2_login.html">ログイン画面へ</a>';
       exit();
}

if (isset($_POST['disp']) == true)
{
       if (isset($_POST['procode']) == false)
       {
                  header('Location:pro2_ng.php');
                  exit();
       }
       $pro2_code = $_POST['procode'];
       header('Location:pro2_disp.php?procode='.$pro2_code);
       exit();
}

if (isset($_POST['add']) == true)
{
        header('Location:pro2_add.php');
        exit();
}

if (isset($_POST['edit']) == true)
{
       if (isset($_POST['procode']) == false)
       {
               header('Location:pro2_ng.php');
               exit();
       }
       $pro2_code = $_POST['procode'];
       header('Location:pro2_edit.php?procode='.$pro2_code);
       exit();
}

if (isset($_POST['delete']) == true)
{
       if (isset($_POST['procode']) == false)
       {
               header('Location:pro2_ng.php');
               exit();
       }
       $pro2_code = $_POST['procode'];
       header('Location:pro2_delete.php?procode='.$pro2_code);
       exit();
}

?>