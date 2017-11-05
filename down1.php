<?php
session_start();
include_once 'dbconnect.php';
$res=mysql_query("SELECT * FROM users WHERE id=".$_SESSION['user']);
$user=mysql_fetch_array($res);
?>
<!DOCTYPE html>

<html lang="en">


<head>
<style type="text/css">
#squirrelhosting {
  width: 700px ;
  margin-left: auto ;
  margin-right: auto ;
  text-align:left;
  
}
</style>


    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">

   <title>Weshare-the best way to share</title>

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
                 <a class="navbar-brand" style="font-family:'Brush Script MT'; font-size:x-large; font-weight:bold; color:#ee4b28;" href="home.php">WeShare</a>
                <a class="navbar-brand" href="home.php" style="position:relative; bottom:5px;"><img src="icon4.png"></a>
            </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
             <li><div>
     <a href="home.php" class="btn2 btn-lg" style = " margin:0px;position:relative; top:8px; border-radius:0px;"><?php echo $user['username'];?></a>
    <a href="contactus.html" class="btn2 btn-lg" style = "margin:0px; position:relative; top:8px; border-radius:0px;">Contact Us</a>
    <a href="logout.php?logout" class="btn2 btn-lg" style = "margin:0px; position:relative; top:8px; border-radius:0px;">Logout</a>
</li>
          </ul>
        </div>
       </div>
    </nav>

    <header>
        <div class="header-content">
          <div>
			<div id="squirrelhosting" class="panel panel-default " style = "align:center; 
    position: relative; top:40px; ">
						<div class="panel-heading"><h3>Uploaded Files</h3></div>
			<div class="panel-body">
<!--<div class="container-fluid" style="height:1000px">-->
<div class="scrollable">
    <!-- Your table --> 
 <table class="table table-hover table-condensed">
    <tbody>
	     <?php
include 'library/config.php';
include 'library/opendb.php';


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
      <tr style="color:#f05f40;">
        <th style = "vertical-align:middle; text-align:center;"><?php echo $fname."   " ;?></th>
        <td>
  <a href="download1.php?id=<?php echo $id;?>" class="btn btn-xs btn-warning" style = "color:black;"><?php echo "Download";?></a>
  <a href="delete.php?id=<?php echo $id;?>" class="btn btn-xs btn-warning" style = "color:black;"><?php echo "Delete";?></a>
  <a class="btn btn-xs btn-warning" style = "color:black;" data-toggle="collapse" data-target="#demo<?php echo $id;?>"><?php echo "Get Link";?></a>
	<div id="demo<?php echo $id;?>" class="collapse"><b>URL :http://localhost/abhishek/download2.php?id=<?php echo $id;?></b></div>
  </td>
      </tr>
      <?php
  }

}
}
include 'library/closedb.php';
?>
     </tbody>
  </table>
	</div>
	</div>
</div>
        </div>
        </div>
    </div>
	</header>
</body>
</html>

  