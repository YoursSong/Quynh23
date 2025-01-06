<?php
    $_SERVER="localhost";
    $USER="root";
    $PASSWORD="";
    $DATABASE="hotel";
    $conn = mysqli_connect($_SERVER,$USER,$PASSWORD,$DATABASE);
    mysqli_query($conn,'set names "utf8"');
    ?>