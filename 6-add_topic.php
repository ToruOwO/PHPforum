<?php
session_start();
include '0-connect.php';

if(!isset($_SESSION['user']))
{
	echo '<a href="2-signin.php">Sign in</a> or <a href="1-register.php">create an account</a>.';
}

else{

$topic_subject=$_POST['topic_subject'];
$topic_content=$_POST['topic_content'];
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
$user_name=$userRow['user_name'];

$sql="INSERT INTO topics(topic_subject, topic_content, topic_by)VALUES('$topic_subject', '$topic_content', '$user_name')";
$result=mysql_query($sql);

if($result){
echo "New topic created! <br />";
echo "<a href=main_forum.php>View your topic</a>";
}
else {
echo "Something went wrong... Please try again later.";
}
mysql_close();

}

?>