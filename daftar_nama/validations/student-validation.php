<?php

function validate($name, $email){
    $result=[
        'error' => true,
        'message' => [],
    ];

    if(empty($name)) {
        $result['message'][] = 'Nama tidak boleh kosong';
    } else if (strlen($name) <= 3) {
        $result['message'][] = 'Nama minimal 3 karakter';
    }

    if(empty($email)){
        $result['message'][] = 'Email tidak boleh kosong';
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result['message'][] = 'Email tidak valid';
    }

    if (count($result['message']) <= 0){
        $result['error'] = false;
    }

    return $result;
}