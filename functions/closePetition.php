<?php
include '../class/connection.php';

    $ch = curl_init('api-city.herokuapp.com/api/petitions/close/'.$_GET['eId']);
    
    curl_setopt_array($ch, array(
    CURLOPT_CUSTOMREQUEST => 'PUT',
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
    ));
    
    // Send the request
    $response = curl_exec($ch);

    header("Location:". $_SERVER['HTTP_REFERER']);
?>