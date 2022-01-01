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
       if (isset($_POST['staffcode']) == false)
       {
                  header('Location:staff2_ng.php');
                  exit();
       }
       $staff2_code = $_POST['staffcode'];
       header('Location:staff2_disp.php?staffcode='.$staff2_code);
       exit();
}

if (isset($_POST['add']) == true)
{
        header('Location:staff2_add.php');
        exit();
}

if (isset($_POST['edit']) == true)
{
       if (isset($_POST['staffcode']) == false)
       {
               header('Location:staff2_ng.php');
               exit();
       }
       $staff2_code = $_POST['staffcode'];
       header('Location:staff2_edit.php?staffcode='.$staff2_code);
       exit();
}

if (isset($_POST['delete']) == true)
{
       if (isset($_POST['staffcode']) == false)
       {
               header('Location:staff2_ng.php');
               exit();
       }
       $staff2_code = $_POST['staffcode'];
       header('Location:staff2_delete.php?staffcode='.$staff2_code);
       exit();
}

?>
