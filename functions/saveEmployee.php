<?php
include '../class/connection.php';
    if(isset($_POST['nameEmployee']) && isset($_POST['emailEmployee']) && isset($_POST['pswEmployee']) && isset($_POST['phoneEmployee'])) {
        $c=new connection();
        $dateS=new DateTime();
        $psw=  md5($_POST['pswEmployee']);
        $c->query('INSERT INTO login values ("'.$_POST["emailEmployee"].'","'.$psw.'")'); 
        $c->query('INSERT INTO users(u_name, u_email, u_role, u_date, u_phone) VALUES ("'.$_POST["nameEmployee"].'","'.$_POST["emailEmployee"].'","employee","'.$dateS->format("Y-m-d").'","'.$_POST["phoneEmployee"].'")');
        $c->query('SELECT * FROM users WHERE u_email="'.$_POST['emailEmployee'].'";');
        $res=$c->getResult();
        $idU=$res[0];
        $c->query('INSERT INTO employee (u_id) values ('.$idU.')');
        
    }
    header("Location:". $_SERVER['HTTP_REFERER']);
?>