<?php
session_start();
include '0-connect.php';

    echo '<html>
    <head>
    <title>PHP forum</title>
    </head>
    <body>';

echo '<h3>Sign in</h3>';

if(isset($_SESSION['user'])!="")
{
    echo 'You are already signed in! You can go to <a href = "3-index.php">homepage</a> or <a href = "4-signout.php?signout">sign out</a> if you want.';
}

else{
	echo '<form method="post" action="">
            Username: <input type="text" name="user_name"/>
            Password: <input type="password" name="user_pass">
            <input type="submit" value"Sign in" name="signin"/>
            </form>';
   
   if(isset($_POST['signin']))
    {
    	 $user_name = mysql_real_escape_string($_POST['user_name']);
    	 $user_pass = mysql_real_escape_string($_POST['user_pass']);
    	 $res = mysql_query("SELECT * FROM users WHERE user_name='$user_name'");
    	 $row = mysql_fetch_array($res);
        
		if($row['user_pass']==md5($user_pass))
		{
			$_SESSION['user'] = $row['user_id'];
			echo 'Welcome, '.$_SESSION['user_name'].'<a href="3-index.php">Click to go to the forum</a>.';
		}
		else
		{
			echo 'Something went wrong while signing in. Please try again later.';
		}
        
    }
}




echo '</body>
    </html>';

?>
