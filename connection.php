<?php
try{
    $dsn = 'mysql:host=localhost; dbname=school';
    $user = 'root';
    $pass = '';
    $con = new PDO($dsn, $user, $pass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo 'successfully connection!';
}
catch(PDOExecption $e){
    echo 'ERROR, ' . $e->getmessage();
}