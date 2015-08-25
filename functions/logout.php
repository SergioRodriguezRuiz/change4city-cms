<?php

session_start();
include '../class/session.php';


session::deleteSession();
header("Location: ../index.html");
?>