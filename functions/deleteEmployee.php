<?php
include '../class/connection.php';
    if($_GET['uId']) {
        $c=new connection();
        $c->query('SELECT e_id FROM employee WHERE u_id='.$_GET['uId'].';');
        $eId=$c->getResultByTag(0);
        $c->query('DELETE FROM employee WHERE e_id='.$eId.';'); 
        $c->query('SELECT u_email FROM users WHERE u_id='.$_GET['uId'].';');
        $email=$c->getResultByTag(0);
        $c->query('DELETE FROM users WHERE u_id='.$_GET['uId'].';');
        $c->query('DELETE FROM login WHERE l_email="'.$email.'";');
        echo $eId;
    }
    if($_SESSION['role']!='admin') {
        header("Location: logout.php");
    }
    else {
        header("Location: ../users.php");
    }
?>