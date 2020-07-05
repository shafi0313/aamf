<?php

    $host    = 'localhost';
    $user    = 'root';
    $pass    = '';
    $db_name = 'php_aamf2';

    $cont = mysqli_connect($host, $user, $pass, $db_name);

    if(mysqli_connect_error()) {
        echo 'Field to Connect Database'.mysqli_connect_error();
    }

?>