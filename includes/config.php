<?php

    $host    = 'localhost';
    $user    = 'root';
    $pass    = '132';
    $db_name = 'php_aamf';

    $cont = mysqli_connect($host, $user, $pass, $db_name);

    if(mysqli_connect_error()) {
        echo 'Field to Connect Database'.mysqli_connect_error();
    }

?>