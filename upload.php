<!DOCTYPE html>

<html lang="en">


<head>
<style type="text/css">
#squirrelhosting {
  width: 700px ;
  margin-left: auto ;
  margin-right: auto ;
  text-align:left;
  height:300px
}
</style>


    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">

   <title>Weshare the best way to share</title>

    <link rel="stylesheet" href="bootstrap.min.css" type="text/css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script type="text/javascript" src="bootstrap.min.js"></script>
    <script type="text/javascript" src="jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="jquery.leanModal.min.js"></script>
    <link type="text/css" rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="font-awsesome/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="animate.min.css" type="text/css">
    <link rel="stylesheet" href="creative.css" type="text/css">
</head>
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
       <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                </button>
                 <a class="navbar-brand" style="font-family:'Brush Script MT'; font-size:x-large; font-weight:bold; color:#ee4b28;" href="index.html">WeShare</a>
                <a class="navbar-brand" href="index.html" style="position:relative; bottom:5px;"><img src="icon4.png"></a>
            </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
             <li><div>
     <a href="index.html" class="btn2 btn-lg" style = "margin:0px;position:relative; top:8px; border-radius:0px;">Home</a>
    <a href="contactus.html" class="btn2 btn-lg" style = "margin:0px; position:relative; top:8px; border-radius:0px;">Contact Us</a>
      <a href="login.php" class="btn2 btn-lg" style = "margin:0px; position:relative; top:8px; border-radius:0px;">Login</a>
    <a href="register.php" class="btn2 btn-lg" style = "margin:0px; position:relative; top:8px; border-radius:0px;">Sign Up</a>
</li>
          </ul>
        </div>
       </div>
    </nav>
<?php
include_once 'dbconnect.php';
// This is the directory where images will be saved
if(isset($_POST['upload']))
{
  $target = "/var/www/html/upload1/";
  $target = $target.basename( $_FILES['userfile']['name']);

  // This gets all the other information from the form
  $file=($_FILES['userfile']['name']);
  $type=$_POST['type'];
$pass=$_POST['password'];


// Name of the gz file we're creating
//$gzfile = "/var/www/html/upload1/".$file;

// Open the gz file (w9 is the highest compression)
//$fp = gzopen ($gzfile, 'w9');

// Compress the file
//
// Close the gz file and we're done




  // Writes the photo to the server
  if(move_uploaded_file($_FILES['userfile']['tmp_name'], $target))
  {
  // Writes the information to the database
  $query = "INSERT INTO upload1(fname,type,password) VALUES ('$file','$type','$pass')";
  mysql_query($query) or die('Error, query failed');

  // Tells you if its all ok
  //echo "The file ". basename( $_FILES['userfile']['name']). " has been uploaded."."<br>";
  $q = "SELECT * FROM upload1 WHERE fname = '$file'";
  $res = mysql_query($q) or die('Error, query failed');
  list($id) = mysql_fetch_array($res);
  //echo "the url of file: localhost/abhishek/download.php?id=".$id;
  }
  
?>
    <header>
        <div class="header-content">
          <div>
      <div id="squirrelhosting" class="panel panel-default " style = "align:center; 
    position: relative; top:40px; ">
            <div class="panel-heading"><h3><center>Your file has been uploaded successfully.</center></h3></div>
      <div class="panel-body">
<!--<div class="container-fluid" style="height:1000px">-->
<div class="scrollable">
    <!-- Your table --> 
 <table class="table table-hover table-condensed">
    <tbody>
     
      <tr style="color:#f05f40;">
        <th style = "vertical-align:middle; text-align:center;">Link: </th>
        <td><a href="http://localhost/abhishek/download.php?id=<?php echo $id;?>">
  http://localhost/abhishek/download.php?id=<?php echo $id;?></a>
  </td>
      </tr>
      <tr style="color:#f05f40;">
        <th style = "vertical-align:middle; text-align:center;">File name: </th>
        <td>
  <?php echo $file;?>
  </td>
      </tr>
      <tr style="color:#f05f40;">
        <th style = "vertical-align:middle; text-align:center;">Size: </th>
        <td>
  <?php $size=filesize($target);
  echo $size." bytes";?> 
  </td>
</tr>
       <tr style="color:#f05f40;">
        <th style = "vertical-align:middle; text-align:center;">Days left until expiration: </th>
        <td>
  30 days
  </td>
      </tr>
      <tr style="color:#f05f40;">
        <th style = "vertical-align:middle; text-align:center;">Delete: </th>
        <td>
  Wanna cancel the uploaded file. <a href="delete1.php?id=<?php echo $id;?>">Delete</a>
  </td>
      </tr>

     </tbody>
  </table>
  </div>
  </div>
</div>
        </div>
        </div>
    </div>
  </header>
  <?php
}
else {
?>
  <header>
        <div class="header-content">
          
            <div class="panel-body"><h3>Sorry, your file has not been uploaded.</h3></div>
            </div></div></dsiv>
          </header>
 <?php  }

?> 

</body>
</html>


