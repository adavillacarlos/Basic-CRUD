<?php
    $host = 'localhost';
    $user = 'root';
    $password ='';
    $database ='php_crud';

    $connection = mysqli_connect($host,$user,$password,$database);
    if(mysqli_connect_error()){
        echo "Unable to connect <br>";
        echo 'Message: ' .mysqli_connect_error(). '<br>';
    }

?>