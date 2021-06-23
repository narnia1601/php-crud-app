<?php
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'php_crud';
    $mysqli = new mysqli($server,$username,$password,$dbname);
    if($mysqli->connect_error){
        die('Erorr: '.$mysqli->connect_error);
    }
?>