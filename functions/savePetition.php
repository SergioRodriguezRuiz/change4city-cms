<?php
include '../class/connection.php';
    
    // The data to send to the API
    $postData = array(
      'name' => $_POST['namePet'],
      'description' => $_POST['descriptionPet'],
      'theme' => $_POST['themePet'],
      'date' => $_POST['datePet'],
    );
    $ch = curl_init('api-city.herokuapp.com/api/petitions');
    
    curl_setopt_array($ch, array(
    CURLOPT_POST => TRUE,
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
    CURLOPT_POSTFIELDS => json_encode($postData)
    ));
    
    // Send the request
    $response = curl_exec($ch);
    
    if($response === FALSE){
    echo 'error post php tp api';
    }
    header("Location:". $_SERVER['HTTP_REFERER']."#petition");
?>