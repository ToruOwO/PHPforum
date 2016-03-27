<?php

session_start();
include '0-connect.php';

$topic_id=$_GET['topic_id'];
$sql="SELECT * FROM topics WHERE topic_id='$topic_id'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);
?>

<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#000000">
<tr>
<td><table width="100%" border="0" cellpadding="3" cellspacing="1" bordercolor="1" bgcolor="#FFFFFF">
<tr>
<td bgcolor="#F8F7F1"><strong><? echo $rows['topic_subject']; ?></strong></td>
</tr>

<tr>
<td bgcolor="#F8F7F1"><? echo $rows['topic_content']; ?></td>
</tr>

<tr>
<td bgcolor="#F8F7F1"><strong>By: </strong> <? echo $rows['topic_by']; ?></td>
</tr>

</table></td>
</tr>
</table>
<BR>

<?php

$sql2="SELECT * FROM posts WHERE post_topic='$topic_id'";
$result2=mysql_query($sql2);
while($rows=mysql_fetch_array($result2)){
?>

<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#000000">
<tr>
<td><table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td bgcolor="#F8F7F1"><strong>ID</strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1"><? echo $rows['post_id']; ?></td>
</tr>
<tr>
<td width="18%" bgcolor="#F8F7F1"><strong>By</strong></td>
<td width="5%" bgcolor="#F8F7F1">:</td>
<td width="77%" bgcolor="#F8F7F1"><? echo $rows['post_by']; ?></td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><strong>Post</strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1"><? echo $rows['post_content']; ?></td>
</tr>
</table></td>
</tr>
</table><br>
 
<?php
}

$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);

?>

<BR>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#000000">
<tr>
<form name="form1" method="post" action="9-add_post.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td valign="top"><strong>Post</strong></td>
<td valign="top">:</td>
<td><textarea name="post_content" cols="45" rows="3" id="post_content"></textarea></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input name="topic_id" type="hidden" value="<? echo $topic_id; ?>"></td>
<td><input name="post_by" type="hidden" value="<? $userRow['user_name'] ?>"></td>
<td><input type="submit" name="Submit" value="Submit"> <input type="reset" name="Submit2" value="Reset"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>