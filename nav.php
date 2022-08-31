<?php
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login']!=true){
    $login=false;
}
else{
    $login=true;
}


echo '<html>
    <head>
        <title></title>
        <style>
            *{
                padding: 0%;
                margin: 0%;
            }
            .navbar{
                width: 100%;
                height: 60px;
                background-color: lightblue;
                margin-bottom: 20px;
            }
            .navbar ul li{
                margin-top: 16px;
                margin-left: 40px;
                float: left;
                list-style: none;
            }
            .navbar ul li a{
                font-size: 22px;
                text-decoration: none;
                color: white;
            }
            .navbar ul li a:hover{
                font-size: 22px;
                text-decoration: none;
                color: black;
            }
        </style>
    </head>
    <body>
        <div class="navbar">
            <ul>
                <li><a href="home.php">Home</a></li>';
                if(!$login){
                echo '<li><a href="index.php">Sign In</a></li>
                <li><a href="signup.php">Sign Up</a></li>';}
                if($login){
                echo '<li><a href="logout.php">Logout</a></li>';}
            echo '</ul>
        </div>
    </body>
</html>';