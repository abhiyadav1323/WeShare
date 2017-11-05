<?php 
// block any attempt to the filesystem 
session_start();
include_once 'dbconnect.php';
if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$query = "SELECT * FROM upload1 WHERE id = '$id'";
	$result = mysql_query($query) or die('Error, query failed');
	list($id,$fname,$type,$pass,$time) = mysql_fetch_array($result);
/*echo $_GET['id']."<br>";
echo $_GET['fname']."<br>";
echo basename($_GET['fname'])."<br>";*/
$nextWeek = time() - (7 * 24 * 60 * 60);
$time1= date('Y-m-d') ;
$time2= date('Y-m-d', $nextWeek);
if (basename($fname) == $fname) 
{ 
	$filename = $fname; 
} 
else 
{ 
	$filename = NULL; 
} 
// define error message 
$err = 'Sorry, the file you are requesting is unavailable.';
if (!$filename) 
{ 
// if variable $filename is NULL or false display the message 
	echo $err; 
} 
else if($type==2)
{
	$_SESSION['id']=$id;
	//echo $id;
	header("Location: pass1.php");
}
else 
{ 
	// define the path to your download folder plus assign the file name 
	$path = '/var/www/html/upload1/'.$filename; 
	// check that file exists and is readable 
	if (file_exists($path) && is_readable($path)) 
	{ // get the file size and send the http headers 
		$size = filesize($path); 
		header('Content-Type: application/octet-stream'); 
		header('Content-Length: '.$size); 
		header('Content-Disposition: attachment; filename='.$filename); 
		header('Content-Transfer-Encoding: binary'); 
		// open the file in binary read-only mode 
		// display the error messages if the file can´t be opened 
		$file = @ fopen($path, 'rb'); 
		if ($file) 
		{ 
			// stream the file and exit the script when complete 
			fpassthru($file); 
			exit; 
		} 
		else 
		{ 
			echo $err; 
		} 
	} 
	else 
	{ 
		echo $err; 
	} 
}
}
else 
echo "error"; 