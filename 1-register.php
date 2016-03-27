<?php

session_start();
if(isset($_SESSION['user'])!="")
{
 header("Location: 3-index.php");
}

include '0-connect.php';

    echo '<html>
    <head>
    <title>PHP forum</title>
    </head>
    <body>';

echo '<h3>Sign up</h3>';
 

echo '<form method="post" action="">
        Username: <input type="text" name="user_name" /><br/>
        Password: <input type="password" name="user_pass"><br/>
        E-mail: <input type="email" name="user_email"><br/><br/>
        <input type="submit" value="Sign Up" name="signup"/>
     </form>';

if(isset($_POST['signup']))
{
	$user_name = mysql_real_escape_string($_POST['user_name']);
	$user_email = mysql_real_escape_string($_POST['user_email']);
	$user_pass = md5(mysql_real_escape_string($_POST['user_pass']));
 
    $errors = array();
     
    if(isset($_POST['user_name']))
    {
          if(!ctype_alnum($_POST['user_name']))
          {$errors[] = 'The username can only contain letters and digits.';}
          if(strlen($_POST['user_name']) > 30)
          {$errors[] = 'The username cannot be longer than 30 characters.';}
    }
    else
    {$errors[] = 'The username field must not be empty';}

    if(!empty($errors))
    {
            echo 'Some fields are not filled in correctly...';
            echo '<ul>';
            foreach($errors as $key => $value) 
            {
            echo '<li>'.$value.'</li>';
            }
            echo '</ul>';
     }
     else
     {
            $sql = "INSERT INTO
                users(user_name,user_pass,user_email)
                VALUES('$user_name','$user_pass','$user_email');";
	 }
                          
         $result  = mysql_query($sql);
                          
         if(!$result){
         	echo 'Something went wrong while registering. Please try again later.';
		 }
		 
		 else {
		 	echo 'Successfully registered! You can now <a href="2-signin.php">sign in</a> and start posting :)!';}
        }
       
echo '</body>
    </html>';

?>
