<?php
require 'nav.php';
$login = false;
$err = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'dbconnect.php';
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    // $sql="select * from student where sid='$uname' AND spass='$pass'";
    $sql = "select * from student where sid='$uname'";
    $result = mysqli_query($link, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($pass, $row['spass'])) {
            $login = true;
            $_SESSION['login'] = true;
            $_SESSION['uname'] = $uname;
            header("location: home.php");
        } else {
            $err = true;
        }
    } else {
        $err = true;
    }
}
?>

<html>

    <head>
        <title>Login</title>
        <style>
            * {
                padding: 0%;
                margin: 0%;
            }

            .container {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .box {
                width: 120%;
                height: 30px;
                margin-bottom: 10px;
            }

            span {
                font-size: large;
            }

            .btn {
                margin-top: 10px;
                width: 120%;
                height: 30px;
            }
        </style>
    </head>

    <body>
<?php
if ($login) {
    echo "<script> alert('Login Successfully'); </script>";
}
if ($err) {
    echo "<script> alert('Invalid Login'); </script>";
}
?>
        <div class="container">
            <form action="index.php" method="post">
                <h2>Login to Our Website</h2><br>
                <div class="input">
                    <span>Username </span>
                    <input type="text" name="uname" class="box" />
                </div>
                <div class="input">
                    <span>Password </span>
                    <input type="password" name="pass" class="box" />
                </div>
                <input type="submit" value="login" class="btn">
            </form>
        </div>
    </body>

</html>