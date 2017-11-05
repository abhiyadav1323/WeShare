<?php
session_start();
include_once 'dbconnect.php';
$res=mysql_query("SELECT * FROM users WHERE id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
$uname=$userRow['username'];
if(isset($_POST['upload']))
{
// This is the directory where images will be saved
$target = "/var/www/html/upload/";
$target = $target.basename( $_FILES['userfile']['name']);
//echo $target."<br>";

//$path_parts = pathinfo('$_FILES['userfile']['name']');
//echo $path_parts['filename'];

// This gets all the other information from the form

$file=($_FILES['userfile']['name']);
$type=$_POST['type'];
$pass=$_POST['password'];
//echo $file."<br>";
// Name of the gz file we're creating
//$gzfile = "/var/www/html/upload/".$file.".gz";
//echo $gzfile."<br>";
// Open the gz file (w9 is the highest compression)
//$fp = gzopen ($gzfile, 'w9');

// Compress the file
//gzwrite ($fp, file_get_contents($_FILES['userfile']['tmp_name']));

// Close the gz file and we're done
//gzclose($fp);

// Writes the file to the server
if(move_uploaded_file($_FILES['userfile']['tmp_name'], $target))
{
// Writes the information to the database
$query = "INSERT INTO upload(username,fname,type,password) VALUES ('$uname', '$file','$type','$pass')";
mysql_query($query) or die('Error, query failed');

// Tells you if its all ok?>
<script>alert('<?php echo "The file ". basename( $_FILES['userfile']['name']). " has been uploaded.";?>')</script>
<?php
  //header("Location: UPLOAD1.html");
}
else {

// Gives and error if its not?>
<script>alert('<?php echo "Sorry, there was a problem uploading your file.". $_FILES['userfile']['error'];?>')</script>
<?php

}
gzclose($fp);
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
    <a href="home.php" class="btn2 btn-lg" style = "margin:0px;position:relative; top:8px; border-radius:0px;"><?php echo $uname;?></a>
    <a href="contactus.html" class="btn2 btn-lg" style = "margin:0px; position:relative; top:8px; border-radius:0px;">Contact Us</a>
     <a href="logout.php?logout" class="btn2 btn-lg" style = "margin:0px; position:relative; top:8px; border-radius:0px;">Logout</a>
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
  <form method="post" action="upload1.php" enctype="multipart/form-data">
  <table align="center" width="30%" border: 0>
  <h3> upload files</h3>
    <tr>
      <td><input type="file" name="userfile" class = "form-control"/></td>
    </tr>
    <tr>
     <td style= "color:white;">
        <input type="radio" style=" width:20px;
        height:20px;" name="type" id="choice1" value="1" checked><span style="position:relative; bottom:5px;left:5px;"><label for="choice1">Public&nbsp&nbsp</label></span> 
        <input style=" width:20px;
        height:20px;" type="radio" id="choice2" name="type" value="2" ><span style="position:relative; bottom:5px;left:5px;"><label for="choice2">Private&nbsp&nbsp</label></span>
          <input style=" width:20px;
        height:20px;" type="radio" name="type" id ="choice-3" value="3"><span style="position:relative; bottom:5px;left:5px;"><label for="choice-3">Password Protected</label></span>
        <br>
        <input type="password" id="passcodearea" name="password" class = "form-control" placeholder="password"/>
      </td>
    </tr>
    <tr>
      <td><button type="submit" class="btn btn-lg btn-primary btn_red btn-block" name="upload">Add File</button></td>
    </tr>
     </table>
  </form>
  </div>
  </center>
        </div>
    </header>
</body> 
</html>


