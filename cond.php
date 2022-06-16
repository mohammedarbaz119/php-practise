<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document3</title>
    <link rel="stylesheet" href="s132.css">
</head>
<div class="f">
    <form action="cond.php" method="POST">

        <div class="d"> <label for="1" style="align-self: center;">ENTER YOUR NAME:</label> <input type="text" name="ar" id="1"><br></div>
        <div class="d"> <label for="2">enter yuor password:</label> <input type="password" name="br" placeholder="password 123" id="2"></div>
        <div class="s"> <br><input type="submit" value="SUBMIT" name="o" id="3"></div>

    </form>
</div>

<body>
    <?php
    if (isset($_POST['o'])) {
        $cor = $_POST["ar"];



        $pas = $_POST["br"];

        $co = mysqli_connect("localhost", "root", "", "dbarbaz2");
        if (!$co) {
            die("connection failed");
        }
        //echo "cnnection successful<br>";
        /* function validate($pas,$pasd){
       if(!strcmp($pas,$pasd)){
           return false;
       }
       

   }*/

        $sql = "SELECT roll,name,course,gpa,remarks FROM marks
    WHERE roll = ?";
        $stat = mysqli_prepare($co, $sql);


        mysqli_stmt_bind_param($stat, "i", $cor);
        mysqli_stmt_execute($stat);
        $res = mysqli_stmt_get_result($stat);

        if (!$res) {
            die("<h1>WRONG CREDENTIALS</h1>");
        } else if ($res) {
            $nu = mysqli_num_rows($res);
            //  echo $nu;
            $red = mysqli_fetch_assoc($res);
            echo "<div id='f'><table border = 1px solid black width =700 align = center><tr text-align = center><th>NAME :-</th><th>" . $red['name'] . "</th></tr>";
            echo "<tr style =text-align:center><td>Roll No :-</td><td>" . $red['roll'] . "</td></tr>";
            echo "<tr style= text-align:center > <td>COURSE :-</td><td>" . $red['course'] . "</td></tr>";
            echo "<tr style = text-align:center><td>GPA :-</td><td>" . $red['gpa'] . "</td> </tr>";
            echo "<tr style = text-align:center><td>REMARKS :-</td><td>" . $red['remarks'] . "</td> </tr>";

            echo "</table><div>";
        }
    }
    ?>

</body>

</html>