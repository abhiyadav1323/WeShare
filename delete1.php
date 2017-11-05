<?php 
include_once 'dbconnect.php';
if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$query = "SELECT * FROM upload1 WHERE id = '$id'";
	$result = mysql_query($query) or die('Error, query failed');
	list($id,$fname) = mysql_fetch_array($result);
	$path='/var/www/html/upload1/'.$fname;
	unlink($path);
	$sql = "DELETE FROM upload1 WHERE id= '$id'";
	$res=mysql_query($sql) or die('Error, query failed');
	header("Location: upload.html");
}
else
	echo "error";
?>