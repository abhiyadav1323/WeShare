<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}
if(isset($_POST['btn-login']))
{
 $uname = mysql_real_escape_string($_POST['uname']);
 $upass = mysql_real_escape_string($_POST['pass']);
 $res=mysql_query("SELECT * FROM users WHERE username='$uname'");
 $row=mysql_fetch_array($res);
 if($row["password"]==md5($upass))
 {
  $_SESSION['user'] = $row['id'];
  header("Location: home.php");
 }
 else
 {
  ?>
        <script>alert('wrong details');</script>
        <?php
 }
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
                <a class="navbar-brand" style="font-family:'Brush Script MT'; font-size:x-large; font-weight:bold; color:#ee4b28;" href="index.html">WeShare</a>
                <a class="navbar-brand" href="index.html" style="position:relative; bottom:5px;"><img src="icon4.png"></a>
            
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
  <h3> Log In</h4>
    <tr>
      <td><input type="text" name="uname" class = "form-control" placeholder="User Name" required/></td>
    </tr>
    <tr>
      <td><input type="password" name="pass" class = "form-control" placeholder="Your Password" required/></td>
    </tr>
    <tr>
      <td><button type="submit" class="btn btn-lg btn-primary btn_red btn-block" name="btn-login">Log In</button></td>
    </tr>
    <tr>
      <td><center><p style=" margin: 0px; color:white;">Not yet Registered?</p><a href="register.php">Register Here</a></center></td>
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