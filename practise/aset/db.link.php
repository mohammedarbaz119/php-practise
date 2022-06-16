<?php
$ser = "localhost";
$user = "root";
$pass = "";
$dbn = "dbarbaz1";
$co = mysqli_connect($ser, $user, $pass, $dbn);
if (!$co) {
    die("connection failed " . mysqli_connect_error());
}
echo "yes";
