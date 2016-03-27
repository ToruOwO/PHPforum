<?php
session_start();
include '0-connect.php';

echo '<html>
    <head>
    <title>PHP forum</title>
    </head>
    <body>';

if(!isset($_SESSION['user']))
{
 echo 'You are not signed in yet. <a href = "2-signin.php">Sign in</a> now?';
}

else if(isset($_GET['signout']))
{
 session_destroy();
 unset($_SESSION['user']);
 echo 'Signed out successfully! You can <a href = "2-signin.php">sign in</a> again if you want.';
}

echo '</body>
    </html>';

?>