<?php

if (isset($_POST['disp']) == true)
{
       if (isset($_POST['procode']) ==false)
       {
              header('Location:pro6_ng.php');
              exit();
       }
       $pro6_code = $_POST['procode'];
       header('Location:pro6_disp.php?procode='.$pro6_code);
       exit();
}

if (isset($_POST['add']) == true)
{
       header('Location:pro6_add.php');
       exit();
}

if (isset($_POST['edit']) == true)
{

       if (isset($_POST['procode']) == false)
       {
              header('Location:pro6_ng.php');
              exit();
       }
       $pro6_code = $_POST['procode'];
       header('Location:pro6_edit.php?procode='.$pro6_code);
       exit();
}

if (isset($_POST['delete']) == true)
{

       if (isset($_POST['procode']) == false)
       {
              header('Location:pro6_ng.php');
              exit();
       }
       $pro6_code = $_POST['procode'];
       header('Location:pro6_delete.php?procode='.$pro6_code);
       exit();
}

?>
