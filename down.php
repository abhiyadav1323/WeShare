<?php
session_start();
include_once 'dbconnect.php';
?>
<html>
<head>
<title>Download File From MySQL</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
include 'library/config.php';
include 'library/opendb.php';

$res=mysql_query("SELECT * FROM users WHERE id=".$_SESSION['user']);
$user=mysql_fetch_array($res);
$uname=$user['username'];
$query = "SELECT * FROM upload";
$result = mysql_query($query) or die('Error, query failed');
if(mysql_num_rows($result) == 0)
{
echo "Database is empty <br>";
}
else
{
while(list($id, $username, $fname) = mysql_fetch_array($result))
{
	//echo $username."<br>";
	//echo $uname."<br>";

	if(!strcmp($username,$uname))
	{
	?>
	<?php echo $fname."   " ;?><a href="download1.php?id=<?php echo $id;?>">Download</a>
	<?php echo "    ";?><a href="delete.php?id=<?php echo $id;?>">Delete</a>
	<br>
	<?php
	}

}
}
include 'library/closedb.php';
?>
</body>
</html>