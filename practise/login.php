<?php
session_start();
include "pages/header.php";
include "pages/lognn.php";



if (isset($_POST['o'])) {
    require_once "aset/db.link.php";
    $em = $_POST['lem'];
    $pass = $_POST['lpas'];
    $name = $_POST['lna'];
    $_SESSION['name'] = $name;

    $sql = "SELECT * FROM login
where email = '$em' and pass = '$pass'";
    $res = mysqli_query($co, $sql);
    if ($res === false) {
        die("login failed");
    } else {
        $nu = mysqli_num_rows($res);
        if ($nu == 1) {
            header('location:indesx.php');
        } else {
            die("login failed");
        }
    }
}
