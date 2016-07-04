<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>CONTACT US</title>
	<link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="lib/jquery-1.9.0.min.js"></script>
	<link rel="stylesheet" href="source/jquery.fancybox.css" type="text/css" media="screen" />
	<script type="text/javascript" src="source/jquery.fancybox.pack.js"></script>
	<script src="slider-master/js/jssor.slider.mini.js"></script>
        <script type = "text/javascript" src="fcheck.js"></script>
        <link rel="stylesheet" href="style31.css" />
	<script type="text/javascript">
		$(document).ready(function() {
	$("#navMenu ul li").hover(function() {
		$(this).find("ul").stop().slideToggle(400);
	});
});
	</script>
<style>
#navMenu ul {margin:0;padding:0;list-style:none;background:#252525;text-align:center;position:relative;}
#navMenu ul li a:hover{background:#3d9be9;color:#781705;}
#navMenu ul li{display:inline-block;}
#navMenu ul ul{position:absolute;width:200px;display:none;}
#navMenu ul li ul li a{display:block;height:45px;width:200px;color:#fff;font-family:helvetica;line-height:43px;text-decoration:none;font-size:13px;transition: background 0.5s linear 0s, color 0.5s linear 0s}
a:visited{
  color:white;
}
</style>
</head>
<?php
require("config.inc.php");
if (!empty($_POST)) {
$query = "INSERT into contact (name,email,subject,query) VALUES (:name,:email,:subject,:query)";
$query_params = array(':name' => $_POST['name'],':email' => $_POST['email'],':subject' => $_POST['subject'],':query' => $_POST['query']);
try {
$stmt   = $db->prepare($query);
$result = $stmt->execute($query_params);
}
catch (PDOException $ex) {
$response["success"] = 0;
$response["message"] = "Database Error1. Please Try Again!"; 
echo "<script type='text/javascript'>alert('Something went wrong. Please try again');</script>";
}
$response["success"] = 1;
$response["message"] = "Your query has been registered. We'll get back to you asap";
echo "<script type='text/javascript'>alert('Your query has been registered. We\'ll get back to you asap');window.location.href='home.html';</script>";
}
else {
?>

<body>	

 <header>
 <div class="navbar navbar-default navbar-fixed-top navbar-inverse" id="navMenu">
 <div class="container">
<div class="navbar-header">
                    
                    <a class="navbar-brand" href="home.html"><img src = "logo.png" height="100" width="250"/></a>
                </div>
				<div class="collpase navbar-collapse  navbar-right" id="menu">
					<ul class="nav navbar-nav" id="bar">
					<li></li><br />
						<li><a href="home.html">HOME&nbsp;&nbsp;&nbsp;</a></li>
						<li><a href="about.html">ABOUT US&nbsp;&nbsp;&nbsp;</a></li>
						<li><a href="">PRODUCTS&nbsp;&nbsp;&nbsp;</a>
						<ul>
					    <li><a href="Pre-EngineeredBuildings.html">Pre-Engineered Buildings</a></li>
					    <li><a href="Steel-Fabrication-Services.html">Steel Fabrication Services</a></li>
					    <li><a href="frame.html">Primary Framing Systems</a></li>
					    <li><a href="secframe.html">Secondary Framing Systems</a></li>
						<li><a href="roof.html">Roof and Wall Panels Sheeting</a></li>
						<li><a href="structure.html">Heavy Structural Fabrication</a></li>
				        </ul>
						</li>
						<li><a href="gal.html">GALLARY&nbsp;&nbsp;&nbsp;</a></li>
						<li><a href="contact1.html">CONTACT</a></li>
					</ul>
				</div>

			</div>
 </div>
 </header>
 <div class="jumbotron">
 <div class="container">
 <br /><br/>
 <h1 style="color:#C6C6C6;margin-left:100px;margin-top:30;font: normal normal normal 45px/1.6em avenir-lt-w01_85-heavy1475544,sans-serif;">CONTACT US</h1>
 </div>
 </div>
 
<div class="container" style="margin:100px;">
<p style="font-size:20px;"><b>Get in touch with us by filling contact form below</b></p><br />

<form id="query" method="post" action="contact.php">
<input type="text" class="input" name="name" id="uname" placeholder="*name" /> 
<input type="text" class="input" name="email" id="email1" placeholder="*email" />
<input type="text" class="input" name="subject" id="subject" placeholder="*subject" /><br />
<textarea name="query" class="input" id="query1"  rows="10" placeholder="*enter your query" cols="70"></textarea>
<center><input type="submit" class="submitquery" value="submit" onclick="return validateform();" style="position:relative;" /></center>
</form>
</div>

 
 
 
 <footer style="background:rgb(61, 155, 233); color:white;">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="widget">
					<h5 class="widgetheading">Get in touch with us</h5>
		    <address>
					<strong>Agile P.E.B. & Structures</strong><br>
					 Plot No. 64, VGP Selva Nagar Extn.,<br>
					 Velachery, Chennai 600042<br /><br />
                    No. 304, Multi Pearl, Veerannapalya<br />
                    Bangalore 560045<br /><br />
                    </address>
<!--
					<p>
						<i class="icon-phone"></i> ,  <br>
						<i class="icon-envelope-alt"></i> info@agilepeb.com
					</p>
-->
				</div>
			</div>
			<div class="col-lg-3">
				<div class="widget">
                		<h5 class="widgetheading">Call Us</h5>
						<ul class="link-list">
						<li>90942 75488</li>
						<li>94902 42222</li>
                        </ul>
                        
				</div>
			</div>
			<div class="col-lg-3">
				<div class="widget">
					<h5 class="widgetheading">Latest posts</h5>
	  <ul class="link-list">
						<li><a href="#">Advantages of P.E.B over Concrete Buildings.</a></li>
						<li><a href="#">Process for Pre-Engineered Buildings</a></li>
						<li><a href="#">Capacity Planning </a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div id="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="copyright">
						<p>
							<span>&copy; 2015 Agile P.E.B. &amp; Structures. All rights reserved.
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	</footer>
<script>
      jQuery(document).ready(function ($) {
        var options = { $AutoPlay: true };
        var jssor_slider1 = new $JssorSlider$('slider1_container', options);
    });
</script>
 </body>
 </html>
	<?php
}
?> 
