<?php
session_start();
include '0-connect.php';

    echo '<html>
    <head>
    <title>PHP forum</title>
    </head>
    <body>';
	
	echo '<h3>Topics</h3>';
 
$sql = "SELECT
            topic_id,
            topic_subject,
            topic_content,
            topic_by
        FROM
            topics 
            ORDER BY id DESC";
 
$result = mysql_query($sql);

?>

<table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#000000">
<tr>
<td width="6%" align="center" bgcolor="#FFFFFF"><strong>#</strong></td>
<td width="53%" align="center" bgcolor="#FFFFFF"><strong>Topic</strong></td>
<td width="15%" align="center" bgcolor="#FFFFFF"><strong>Views</strong></td>
<td width="15%" align="center" bgcolor="#FFFFFF"><strong>By</strong></td>
</tr>

<?php
 
if(!$result)
{
    echo 'The topics could not be displayed, please try again later.<br/>';
}
else
{
    if(mysql_num_rows($result) == 0)
    {
        echo 'No topic created yet. <a href="5-create_topic.php">Create a new topic</a>';
    }
    else
    {
        echo '<table border="1">
              <tr>
                <th>Topics</th>
                <th>Last topic</th>
              </tr>'; 
             
        while($row = mysql_fetch_assoc($result))
        {               ?>
          <tr>
          	<td bgcolor="#FFFFFF"><? echo $rows['id']; ?></td>
          	<td bgcolor="#FFFFFF"><a href="8-view_topic.php?id=<? echo $rows['topic_id']; ?>"><? echo $rows['topic_subject']; ?></a><BR></td>
          	<td align="center" bgcolor="#FFFFFF"><? echo $rows['topic_content']; ?></td>
          	<td align="center" bgcolor="#FFFFFF"><? echo $rows['topic_by']; ?></td>
          	</tr>
       <?php }
    }
}

mysql_close();

echo '</body>
    </html>';

?>

<tr>
<td colspan="5" align="right" bgcolor="#FFFFFF"><a href="6-add_topic.php"><strong>Add New Topic</strong></a></td>
</tr>
</table>