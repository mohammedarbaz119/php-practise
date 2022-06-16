
<?php
include "pages/header.php";
include "pages/12.php";

require_once "aset/functions.php";
if (isset($_POST['submit'])) {
    require_once "aset/db.link.php";
    $em = $_POST['em'];
    $pass = $_POST['pas'];
    $name = $_POST['na'];
    $repas = $_POST['pasr'];
    $sql = "INSERT INTO login 
values('$em','$name','$pass')";
    $res = mysqli_query($co, $sql);




    if ($res == false) {
        die("therwr atew errors" . mysqli_error($co));
    } else {
        echo "done adding fields";
    }
}

?>