<?php
    //koneksi db
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'db_pendaftaran';
    
    $conn = mysqli_connect($host, $user, $pass, $db);

    if(!$conn ){
        echo 'error : ' .mysqli_connect_error($conn);
    }

?>