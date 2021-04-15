<?php

    $host    = 'localhost';
    $user    = 'aamfound_amzad';
    $pass    = 'rV59p1c_';
    $db_name = 'aamfound_amzad';

    $cont = mysqli_connect($host, $user, $pass, $db_name);

    if(mysqli_connect_error()) {
        echo 'Field to Connect Database'.mysqli_connect_error();
    }

?>