<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: login.php");
}
$res=mysql_query("SELECT * FROM users WHERE id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
$uname=$userRow['username'];
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

    <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="demo.css" />
		<link rel="stylesheet" type="text/css" href="common.css" />
        <link rel="stylesheet" type="text/css" href="style2.css" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,700' rel='stylesheet' type='text/css' />
		<script type="text/javascript" src="modernizr.custom.79639.js"></script> 
		<link rel="stylesheet" href="bootstrap.min.css" type="text/css">
    
    <script type="text/javascript" src="jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="jquery.leanModal.min.js"></script>
    <link type="text/css" rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="animate.min.css" type="text/css">
    <link rel="stylesheet" href="creative.css" type="text/css">
		<!--[if lte IE 8]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
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
    <a href="logout.php?logout" class="btn2 btn-lg" style = "margin:0px; position:relative; top:8px; border-radius:0px;">Log Out</a>
</li>
          </ul>
        </div>
       </div>
    </nav>
    <header>
        <div class="header-content">
            <div class="header-content-inner"><h1>the best way to share</h1><section class="main">
			
				<ul class="ch-grid">
					<li>
						<div class="ch-item ch-img-1">
							<div class="ch-info">
								<h3><a style="color:white; position:relative; bottom:5px;" href="down1.php">Download Files/Folder</a></h3>
								<p><a href="down1.php">Click Here</a></p>
							</div>
						</div>
					</li>
					<li>
						<div class="ch-item ch-img-2">
							<div class="ch-info">
								<h3><a style="color:white; position:relative; bottom:5px;" href="upload1.php">Upload Files</a></h3>
								<p><a href="upload1.php">Click Here</a></p>
							</div>
						</div>
					</li>
					
				</ul>
				
			</section>
            </div>
        </div>
    </header>
	
</body>
</html>
