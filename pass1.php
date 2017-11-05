<?php
session_start();
$_SESSION['id']=$_SESSION['id']; 
//echo $_SESSION['id'];
include_once 'dbconnect.php';

if(isset($_POST['btn-login']))
{
	$id = $_SESSION['id'];
	//echo $id."<br>";
	$query = "SELECT * FROM upload1 WHERE id = '$id'";
	$result = mysql_query($query) or die('Error, query failed');
	list($id,$fname,$type,$pass) = mysql_fetch_array($result);
	//echo $pass."<br>";
	//echo $_POST['pass']."<br>";
	if($_POST['pass']==$pass)
	{
		$path = '/var/www/html/upload1/'.$fname; 
	// check that file exists and is readable 
	if (file_exists($path) && is_readable($path)) 
	{ // get the file size and send the http headers 
		$size = filesize($path); 
		header('Content-Type: application/octet-stream'); 
		header('Content-Length: '.$size); 
		header('Content-Disposition: attachment; filename='.$fname); 
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
			echo "error"; 
		} 
	}

	}
	else
		?>
        <script>alert('wrong password');</script>
        <?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   <title>Weshare the best way to share</title>
    <link rel="stylesheet" href="bootstrap.min.css" type="text/css">
    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
  <link type="text/css" rel="stylesheet" href="style1.css" />
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="animate.min.css" type="text/css">
    <link rel="stylesheet" href="creative.css" type="text/css">
  <link type="text/css" rel="stylesheet" href="styleform.css" />
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
       <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                </button>
               <a class="navbar-brand" style="font-family:'Brush Script MT'; font-size:x-large; font-weight:bold; color:#ee4b28;" href="home.php">WeShare</a>
                <a class="navbar-brand" href="home.php" style="position:relative; bottom:5px;"><img src="icon4.png"></a>
            </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
             <li><div>
   <a href="index.html" class="btn2 btn-lg" style = "margin:0px;position:relative; top:8px; border-radius:0px;">Home</a>
    <a href="contactus.html" class="btn2 btn-lg" style = "margin:0px; position:relative; top:8px; border-radius:0px;">Contact Us</a>
    </li>
          </ul>
        </div>
       </div>
    </nav>
    <header>
        <div class="header-content">
            <div class="header-content-inner">
            </div>
<center>
  <div id="login-form" class = "">
  <form method="post">
  <table align="center" width="30%" border: 0>
    <tr>
      <td><input type="password" name="pass" class = "form-control" placeholder="Password" required/></td>
    </tr>
    <tr>
      <td><button type="submit" class="btn btn-lg btn-primary btn_red btn-block" name="btn-login">Download</button></td>
    </tr>
  </table>
  </form>
  </div>
  </center>
        </div>
    </header>
</body> 
</body>
</html>