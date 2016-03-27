<?php
session_start();
include '0-connect.php';

    echo '<html>
    <head>
    <title>PHP forum</title>
    </head>
    <body>';
	
	echo '<h3>Home</h3>';

if(!isset($_SESSION['user']))
{
	echo '<a href="2-signin.php">Sign in</a> or <a href="1-register.php">create an account</a>.';
}

else{
	$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
	echo 'Hello ' . $userRow['user_name'] . '. Not you? <a href="4-signout.php?signout">Sign out</a><br/>';
	
	echo '<a href="5-create_topic.php">Create a new topic</a><br/>';
	echo '<a href="7-topic">View all topics</a>';
}

echo '</body>
    </html>';

?>
