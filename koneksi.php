<?php
    //koneksi database
    $sever ="localhost";
    $user = "root";
    $password = "";
    $database = "mhs";

//buat koneksi
$koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));

