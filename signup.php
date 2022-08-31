<?php
require 'nav.php';
$alert = false;
$showerr = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['uname']) || !empty($_POST['pass'])) {
        require 'dbconnect.php';
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        $esql = "select * from student where sid='$uname'";
        $resultt = mysqli_query($link, $esql);
        $row = mysqli_num_rows($resultt);
        if ($row > 0) {
            $showerr = "User Already Exists";
        } else {
            if ($pass == $cpass) {
                $hash = password_hash($pass, PASSWORD_DEFAULT);
                $sql = "insert into student values('$uname','$hash')";
                $result = mysqli_query($link, $sql);
                if ($result) {
                    $alert = true;
                }
            } else {
                $showerr = "Password Mismatch";
            }
        }
    } else {
        $showerr = "Please fill Username and Password";
    }
}
?>

<html>
    <head>
        <title>SignUp</title>
        <style>
            *{
                padding: 0%;
                margin: 0%;
            }
            .container{
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            .box{
                width: 100%;
                height: 30px;
                margin-bottom: 10px;
            }
            span{
                font-size: large;
            }
            .btn{
                margin-top: 10px;
                width: 100%;
                height: 30px;
            }
        </style>
    </head>
    <body>
<?php
if ($alert) {
    echo "<script> alert('SignUp Successfully Now You can Login'); </script>";
}
if ($showerr != "") {
    echo "<script> alert('$showerr'); </script>";
}
?>
        <div class="container">
            <form action="signup.php" method="post">
                <h2>SignUp Here</h2><br>
                <div class="input">
                    <span>Username </span>
                    <input type="text" maxlength="20"  name="uname" class="box"/>
                </div>
                <div class="input">
                    <span>Password </span>
                    <input type="password" maxlength="20" name="pass" class="box"/>
                </div>
                <div class="input">
                    <span>Conform Password </span>
                    <input type="password" name="cpass" class="box"/>
                </div>
                <input type="submit" value="Sign Up" class="btn">
            </form>
        </div>
    </body>
</html>