<?php
// login data validate
include '../class/connection.php';
include '../class/session.php';

if(isset($_POST['email']) && isset($_POST['psw']) && $_POST['email']!='' && $_POST['psw']!='') {
    $conn = new connection();
    $conn->query('SELECT * FROM login where l_email="'.$_POST['email'].'";');
    $res=$conn->getResult();
    if($res) {
        if($res['l_psw']==md5($_POST['psw'])) {
            $email=$res['l_email'];
            $conn->query('SELECT * FROM users WHERE u_email="'.$email.'";');
            $res=$conn->getResult();
            switch ($res['u_role']) {
                case 'admin':
                    $s=new session();
                    $s->set('role', 'admin');
                    $s->set('id',$res['u_id']);
                    $s->set('name', $res['u_name']);
                    $s->set('email', $_POST['email']);
                    echo $_SESSION['name'];
                    header("Location: ../users.php");
                    break;
                case 'employee':
                    $s=new session();
                    $s->set('role', 'employee');
                    $s->set('id',$res['u_id']);
                    $s->set('name', $res['u_name']);
                    $s->set('email', $_POST['email']);
                    $conn->query('SELECT e_id FROM employee WHERE u_id='.$_SESSION['id'].';');
                    $res=$conn->getResultByTag(0);
                    $s->set('idE', $res);
                    //echo $_SESSION['idE'];
                    header("Location: ../employee.php");
                    break;
            }
        }
        else {
            // psw wrong3
            //echo 'psw wrong';
            header("Location: ../index.html");
            
        }
    }
    else {
        //echo 'Email not founf';
        // Email not found
        header("Location: ../index.html");
    }
    $conn->close();
}
else {
    // Data not send
    header("Location: ../index.html");
    die();
}

?>