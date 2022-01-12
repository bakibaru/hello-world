<?php

session_start();

function connect()
{
    return new PDO("mysql:dbname=ecshop2", "root");
}

function img_tag($code)
{
    if (file_exists("img/$code.jpg")) $name = $code;
    else $name = 'noimage';
    return '<img src="img/'.$name.'.jpg" alt="">';
}

?>
