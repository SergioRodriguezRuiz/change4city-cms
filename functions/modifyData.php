<?php

include '../class/connection.php';
session_start();
$c = new connection();
if (isset($_POST['Uname']) && $_POST['Uname']!='') {
    $c->query('UPDATE users SET u_name="'.$_POST['Uname'].'" WHERE u_id='.$_SESSION['id'].';');
    $_SESSION['name']=$_POST['Uname'];
}

if (isset($_POST['psw']) && $_POST['psw']!='') {
    $c->query('UPDATE login SET l_psw="'.md5($_POST['psw']).'" WHERE l_email="'.$_SESSION['email'].'";');
}


if (isset($_POST['phone']) && $_POST['phone']!='') {
    $c->query('UPDATE users SET u_phone="'.$_POST['phone'].'" WHERE u_id='.$_SESSION['id'].';');
}
header("Location:" . $_SERVER['HTTP_REFERER']);
?>