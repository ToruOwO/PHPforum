<?php

session_start();
include '0-connect.php';

$topic_id=$_POST['topic_id'];

$sql="SELECT MAX(post_id) AS Maxpost_id FROM posts WHERE topic_id='$topic_id'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);

if ($rows) {
$Max_id = $rows['Maxpost_id']+1;
}
else {
$Max_id = 1;
}

$post_by=$_POST['post_by'];
$post_content=$_POST['post_content']; 


$sql2="INSERT INTO posts(post_topic, post_id, post_by, post_content)VALUES('$topic_id', '$Max_id', '$post_by', '$post_content')";
$result2=mysql_query($sql2);

if($result2){
echo "Successful<BR>";
echo "<a href='view_topic.php?id=".$topic_id."'>View your post</a>";

}
else {
echo "ERROR";
}

mysql_close();
?>