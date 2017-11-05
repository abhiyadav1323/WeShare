<?php 
session_start();
include_once 'dbconnect.php';
if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$query = "SELECT * FROM upload WHERE id = '$id'";
	$result = mysql_query($query) or die('Error, query failed');
	list($id,$username,$fname) = mysql_fetch_array($result);
	$path='/var/www/html/upload/'.$fname;
	unlink($path);
	$sql = "DELETE FROM upload WHERE id= '$id'";
	$res=mysql_query($sql) or die('Error, query failed');
	header("Location: down1.php");
}
else
	echo "error";
?>