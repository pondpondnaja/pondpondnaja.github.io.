<?php
    session_start();
    session_destroy();
    header('Content-type: application/json');

    $response = array();

    $response['status'] = 'success';
    $response['message'] = 'Logout complete.';

    echo json_encode($response);
?>