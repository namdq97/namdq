<?php
    $dbHost="localhost";
    $dbUser="root";
    $dbPass="";
    $dbName="shop";
    
    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
    
    if($conn){
        $setLang= mysqli_query($conn, "SET NAMES 'UTF8'");
    }
 else {
        die("Ket Noi That Bai".mysqli_connect_error());
    }
    ?>
    

