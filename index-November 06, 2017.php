<?php
// error_reporting(0);
if(isset($_POST['uname']))
{
	$name = $_POST['uname'];
	$sendersmessage = $_POST['umsg'];
	$sender = $_POST['uemail'];
	$mobile = $_POST['utel'];
	$to = "amit.trakkerz@gmail.com";
	$subject = "testing";
	$message =  "<p> Senders Name: ".$name."<br /> Phone number : ".$mobile." <br /> Message: ".$sendersmessage."</p>";
	$headers = "From:".$sender."\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html\r\n";
	//$headers .= 'Cc: sumit.vawsum@gmail.com'; 

	$retval = mail ($to,$subject,$message,$headers);

	if( $retval == true ) 
	{
		echo "<script> alert('Message sent successfully...".$retreval."');</script>";
	}
	else 
	{
		echo "<script> alert('Message could not be sent...');</script>";
	}

// Sumit - 31-Aug-2017 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/trakkerzwhite.png" type="image/x-icon">
  <meta name="description" content="Responsive Bootstrap HTML Mobile Application Template - Free Download">
	<title>Trakkerz | Your Travel Companion</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;subset=latin">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <link rel="stylesheet" href="assets/bootstrap-material-design-font/css/material.css">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/et-line-font-plugin/style.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <style>
	   #map {
		height: 200px;
		width: 90%;
	   }
  </style>
  <script>
	  function initMap() {
		var uluru = {lat: 22.568978, lng: 88.3500461};
		var map = new google.maps.Map(document.getElementById('map'), {
		  zoom: 14,
		  center: uluru
		});
		var marker = new google.maps.Marker({
		  position: uluru,
		  map: map
		});
	  }
	</script>
	<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNUwh7B54O-W_POxPe9Uqer_UOo279Wj8&callback=initMap">
	</script>

	<script type="text/javascript" >
			
			$(document).ready(function()
			{
				$(window).scroll(function() 
				{	// check if scroll event happened
				
					if ($(document).scrollTop() > 40) 
					{	// check if user scrolled more than 50 from top of the browser window
						$(".mbr-editable-menu-item").css("color", "#f8f8f8"); // if yes, then change the color of class "navbar-fixed-top" to white (#f8f8f8)
						$(".navbar-caption").css("color", "#f8f8f8"); // if yes, then change the color of class "navbar-fixed-top" to white (#f8f8f8)
						$("#idLogo").attr("src","assets/images/trakkerzwhite1.png");
						$("#idLogo").attr("alt","Logo");
					}
					else
					{
						$(".mbr-editable-menu-item").css("color", "#4d79bf"); // if not, change it back to grey
						$(".navbar-caption").css("color", "#4d79bf"); // if not, change it back to grey
						$("#idLogo").attr("src","assets/images/trakkerzwhite.png");
						$("#idLogo").attr("alt","Logo");
					}
		  		}
		  	);
			});
	</script>


</head>
<body>
<div id="menu-0" custom-code="true">
<section id="fh5co-header">
	<nav class="navbar navbar-dropdown bg-color transparent navbar-fixed-top">
		<div class="container">

			<div class="mbr-table">
				<div class="mbr-table-cell">

					
						
						<a class="navbar-brand" href=""><span><img id="idLogo" style="width: 20px;height: 27px; margin-left: 3px; margin-bottom: 6px; " src="assets/images/trakkerzwhite.png"><a class="navbar-caption" href="index.php" style="color:#4d79bf;">Trakkerz</a>
					

				</div>
				<div class="mbr-table-cell">

					<button class="navbar-toggler pull-xs-right hidden-md-up" name="button" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
						<div class="hamburger-icon"></div>
					</button>

					<ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar" style="color: #5994ff">
					<li class="nav-item" style="color: #5994ff"><a class="nav-link link mbr-editable-menu-item" href="index.html#header3-k" style="color: #4d79bf">APP</a></li>
					<li class="nav-item" style="color: #5994ff"><a class="nav-link link mbr-editable-menu-item" href="#features4-i" style="color: #4d79bf">SERVICES</a></li>
					<li class="nav-item" style="color: #5994ff"><a class="nav-link link mbr-editable-menu-item" href="#portfolio" style="color: #4d79bf">BLOG</a></li>
					<li class="nav-item" style="color: #5994ff"><a class="nav-link link mbr-editable-menu-item" href="#contact" style="color: #4d79bf">CONTACT US</a></li>

				   <!--  <li class="nav-item dropdown open"><a class="nav-link link dropdown-toggle mbr-editable-menu-item" href="index.html#pricing-table2-f" data-toggle="dropdown-submenu" aria-expanded="true">MORE</a><div class="dropdown-menu"><a class="dropdown-item mbr-editable-menu-item" href="#">What's New</a><a class="dropdown-item mbr-editable-menu-item" href="#">Features</a><a class="dropdown-item mbr-editable-menu-item" href="#">Feedback</a><a class="dropdown-item mbr-editable-menu-item" href=".#">Forum</a></div></li> --> <!-- More option dropdown -->

				  <li class="nav-item nav-btn"><a class="nav-link btn btn-white btn-white-outline mbr-editable-menu-item" href="http://fb.co/trakkerz" style="color: #4d79bf"><span class="mbri-like mbr-iconfont mbr-iconfont-btn"></span>LIKE US ON FACEBOOK!</a></li><li class="nav-item nav-btn"><a class="nav-link btn btn-white btn-white-outline mbr-editable-menu-item" href="http://bit.ly/2xyfvoN" style="color: #4d79bf"><span class="mbri-android mbr-iconfont mbr-iconfont-btn"></span>GET IT ON PLAYSTORE!</a></li>

					</ul>
					<button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
						<div class="close-icon"></div>
					</button>

				</div>
			</div>

		</div>
	</nav>
</section>

<section class="mbr-section mbr-section-hero mbr-section-full header2 mbr-parallax-background mbr-after-navbar" id="header2-1" style="background-image: url(assets/images/mbr-5.jpg);">

   <!-- <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(255, 255, 255);">
	</div> -->

	<div class="mbr-table mbr-table-full">
		<div class="mbr-table-cell">

			<div class="container">
				<div class="mbr-section row">
					<div class="mbr-table-md-up">
						
						
						

						<div class="mbr-table-cell col-md-5 content-size text-xs-center text-md-right">

							<h3 class="mbr-section-title display-2" style="color: #4373bb">Trakkerz</h3>

							<div class="mbr-section-text" style="color: #4373bb">
								<p>Track Anyone. Anywhere. Anytime. &nbsp;</p>
							</div>

							<div class="mbr-section-btn"><!-- <a class="btn btn-black" href="https://mobirise.com">IPHONE</a> --> 
							<a class="btn btn-black" href="http://bit.ly/2xyfvoN">Get it on Playstore NOW!</a> </div>

						</div>
						<div class="mbr-table-cell mbr-valign-top mbr-left-padding-md-up col-md-7 image-size" style="width: 50%;"><center>
							<div class="mbr-figure col-sm-12" style="width:90%"><img alt="home screen" src="assets/images/app-showcase.png"></div></center>
						</div>

					</div>
				</div>
			</div>

		</div>
	</div>

	<div class="mbr-arrow mbr-arrow-floating hidden-sm-down" aria-hidden="true"><a href="#header3-k"><i class="mbr-arrow-icon"></i></a></div>

</section>

<section class="mbr-section mbr-section__container article" id="header3-k" style="background-color: rgb(244, 244, 244); padding-top: 60px; padding-bottom: 0px;">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h3 class="mbr-section-title display-2">Overview</h3>
				
			</div>
		</div>
	</div>
</section>

<section class="mbr-section article mbr-section__container" id="content1-j" style="background-color: rgb(244, 244, 244); padding-top: 20px; padding-bottom: 20px;">

	<div class="container">
		<div class="row">
			<div class="col-xs-12 lead"> Trakkerz is here to make your life even easier! The quickest and safest way to track your family, friends and even your child’s school bus is now at your fingertips!
Trakkerz lets you stay connected on the go! The Trakkerz app provides simple real time location of your family, friends and even your child’s school bus. Track where your family, friends are with the app. Get notification before the bus arrives at the stop so that you don’t have to miss it anymore!
A GPS tracker which lets you stay updated about the people who matter most! Stay updated with your family only on Trakkerz.&nbsp;</div>
		</div>
	</div>

</section>

<section class="mbr-cards mbr-section mbr-section-nopadding" id="features1-e" style="background-color: rgb(244, 244, 244);">

		

	<div class="mbr-cards-row row striped">

		<div class="mbr-cards-col col-xs-12 col-lg-3" style="padding-top: 80px; padding-bottom: 80px;">
			<div class="container">
				<div class="card cart-block">
					<div class="card-img"><img alt="crete group" src="assets/images/screenshots/011.png" class="card-img-top"></div>
					<div class="card-block">
						<h4 class="card-title">Create Group</h4>
						<h5 class="card-subtitle">Track friends</h5>
						<p class="card-text">Create a group to add members and track them.</p>
						
					</div>
				</div>
			</div>
		</div>
		<div class="mbr-cards-col col-xs-12 col-lg-3" style="padding-top: 80px; padding-bottom: 80px;">
			<div class="container">
				<div class="card cart-block">
					<div class="card-img"><img alt="codes" src="assets/images/screenshots/022.png" class="card-img-top"></div>
					<div class="card-block">
						<h4 class="card-title">Share Codes</h4>
						<h5 class="card-subtitle">Two Codes</h5>
						<p class="card-text">There are two codes. One for Parent and other for driver.</p>
						
					</div>
				</div>
			</div>
		</div>
		<div class="mbr-cards-col col-xs-12 col-lg-3" style="padding-top: 80px; padding-bottom: 80px;">
			<div class="container">
				<div class="card cart-block">
					<div class="card-img"><img alt="map" src="assets/images/screenshots/033.png" class="card-img-top"></div>
					<div class="card-block">
						<h4 class="card-title">Track on Map</h4>
						<h5 class="card-subtitle">Track friends on map</h5>
						<p class="card-text">You can track your group members on map.</p>
						
					</div>
				</div>
			</div>
		</div>
		<div class="mbr-cards-col col-xs-12 col-lg-3" style="padding-top: 80px; padding-bottom: 80px;">
			<div class="container">
				<div class="card cart-block">
					<div class="card-img"><img alt="Proximity" src="assets/images/screenshots/044.png" class="card-img-top"></div>
					<div class="card-block">
						<h4 class="card-title">Proximity Notifications</h4>
						<h5 class="card-subtitle">Push notification as well as sms</h5>
						<p class="card-text">Notification will be sent to parent when driver will be approaching.</p>
						
					</div>
				</div>
			</div>
		</div>
		
		
	</div>
</section>

 <section class="mbr-cards mbr-section mbr-section-nopadding"  data-section="features" id="features4-i" style="">
 <br />
<br><br><center><h2><b>Services</b></h2></center>
	<div class="mbr-cards-row row">
		<div class="mbr-cards-col col-xs-12 col-lg-4" style="padding-top: 80px; padding-bottom: 80px;">
			<div class="container">
				<div class="card cart-block">
					<div class="card-img iconbox" style="border-radius:64px;border-color:rgb(233, 165, 211);"><a class="mbri-gift mbr-iconfont mbr-iconfont-features4" style="color: rgb(233, 165, 211);"></a></div>
					<div class="card-block">
						<h4 class="card-title">Personalised Groups</h4>
						<h5 class="card-subtitle"></h5>
						<p class="card-text">Private groups with access only available to group members. No outsider can view or join your group without your permission. Safe and Secure.</p>
						
					</div>
				</div>
			</div>
		</div>
		<div class="mbr-cards-col col-xs-12 col-lg-4" style="padding-top: 80px; padding-bottom: 80px;">
			<div class="container">
				<div class="card cart-block">
					<div class="card-img iconbox" style="border-radius:64px;border-color:rgb(39, 170, 224);"><a class="mbri-preview mbr-iconfont mbr-iconfont-features4" style="color: rgb(39, 170, 224);"></a></div>
					<div class="card-block">
						<h4 class="card-title">Keep track of your group members</h4>
						<h5 class="card-subtitle"></h5>
						<p class="card-text">Be it your family members, be it your employees, be it your team mates. Track each and everything with Trakkerz app. With Trakkerz, tracking is easy.</p>
						
					</div>
				</div>
		  </div>
		</div>
		<div class="mbr-cards-col col-xs-12 col-lg-4" style="padding-top: 80px; padding-bottom: 80px;">
			<div class="container">
				<div class="card cart-block">
					<div class="card-img iconbox" style="border-radius:64px;border-color:rgb(58, 35, 179);"><a class="mbri-bootstrap mbr-iconfont mbr-iconfont-features4" style="color: rgb(58, 35, 179);"></a></div>
					<div class="card-block">
						<h4 class="card-title">School Bus Tracking</h4>
						<h5 class="card-subtitle"></h5>
						<p class="card-text">No more wasting time at the bus stop. Leave your house only when the bus is approaching. Get instant customised alerts when the bus is at your vicinity. Save time, money and energy.</p>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="mbr-cards-row row">
		<div class="mbr-cards-col col-xs-12 col-lg-4" style="padding-top: 80px; padding-bottom: 80px;">
			<div class="container">
				<div class="card cart-block">
					<div class="card-img iconbox" style="border-radius:64px;border-color:rgb(233, 165, 211);"><a class="mbri-delivery mbr-iconfont mbr-iconfont-features4" style="color: rgb(233, 165, 211);border-radius: 2px"></a></div>
					<div class="card-block">
						<h4 class="card-title">Consignment Tracking</h4>
						<h5 class="card-subtitle"></h5>
						<p class="card-text">Track your consignment in real time. See your package live on the map. And know exactly when it will reach you.</p>
						
					</div>
				</div>
			</div>
		</div>
		<div class="mbr-cards-col col-xs-12 col-lg-4" style="padding-top: 80px; padding-bottom: 80px;">
			<div class="container">
				<div class="card cart-block">
					<div class="card-img iconbox" style="border-radius:64px;border-color:rgb(39, 170, 224);"><a class="mbri-hearth mbr-iconfont mbr-iconfont-features4" style="color: rgb(39, 170, 224);"></a></div>
					<div class="card-block">
						<h4 class="card-title">Made with Love</h4>
						<h5 class="card-subtitle"></h5>
						<p class="card-text">We are a very hardworking and creative group of people who've handcrafted this app with an aim to end all the tracking issues. This app is made in India, with Love.</p>
						
					</div>
				</div>
		  </div>
		</div>
		<div class="mbr-cards-col col-xs-12 col-lg-4" style="padding-top: 80px; padding-bottom: 80px;">
			<div class="container">
				<div class="card cart-block">
					<div class="card-img iconbox" style="border-radius:64px;border-color:rgb(58, 35, 179);"><a class="mbri-like mbr-iconfont mbr-iconfont-features4" style="color: rgb(58, 35, 179);border-radius: 2px"></a></div>
					<div class="card-block">
						<h4 class="card-title">Traveller's safety</h4>
						<h5 class="card-subtitle"></h5>
						<p class="card-text">Trakkerz is an app which ensures your loved ones know about your present location.</p>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
  
<section class="bg-light mbr-cards mbr-section mbr-section-nopadding" style="padding-left: 5%" id="portfolio" data-section="blog">
<br /><br />
	  <div class="container">
	  <div class="row"><br><br>
		  <div class="col-lg-12 text-center">
			<center><h3 class="section-heading mbr-section-title display-2">BLOG</h3></center>
			<!-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> -->
		  </div>
		</div>
	  <div class="row">
		  <div class="col-md-4 col-sm-6 portfolio-item">
			<a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
			  <div class="portfolio-hover">
				<div class="portfolio-hover-content">
				  <i class="fa fa-plus fa-3x"></i>
				</div>
			  </div>
			  <img class="img-fluid" src="assets/images/schoolbus3.jpg" alt="bus">
			</a><br>
			<div class="portfolio-caption">
			  <h4>Track School Bus</h4>
			  <p class="text-muted"></p>
			</div>
		  </div>
		  <div class="col-md-4 col-sm-6 portfolio-item">
			<a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
			  <div class="portfolio-hover">
				<div class="portfolio-hover-content">
				  <i class="fa fa-plus fa-3x"></i>
				</div>
			  </div>
			  <img class="img-fluid" src="assets/images/family3.jpg" alt="friends">
			</a><br>
			<div class="portfolio-caption">
			  <h4>Track Friends & Family</h4>
			  <p class="text-muted"></p>
			</div>
		  </div>
		  <div class="col-md-4 col-sm-6 portfolio-item">
			<a class="portfolio-link" data-toggle="modal" href="#portfolioModal3">
			  <div class="portfolio-hover">
				<div class="portfolio-hover-content">
				  <i class="fa fa-plus fa-3x"></i>
				</div>
			  </div>
			  <img class="img-fluid" src="assets/images/delivery3.jpeg" alt="delivery">
			</a><br>
			<div class="portfolio-caption">
			  <h4>Track Vehicles</h4>
			  <p class="text-muted"></p>
			</div>
		  </div>
		 <!--  <div class="col-md-4 col-sm-6 portfolio-item">
			<a class="portfolio-link" data-toggle="modal" href="#portfolioModal4">
			  <div class="portfolio-hover">
				<div class="portfolio-hover-content">
				  <i class="fa fa-plus fa-3x"></i>
				</div>
			  </div>
			  <img class="img-fluid" src="images/portfolio/04-thumbnail.jpg" alt="">
			</a>
			<div class="portfolio-caption">
			  <h4>Lines</h4>
			  <p class="text-muted">Branding</p>
			</div>
		  </div> -->
		  <!-- <div class="col-md-4 col-sm-6 portfolio-item">
			<a class="portfolio-link" data-toggle="modal" href="#portfolioModal5">
			  <div class="portfolio-hover">
				<div class="portfolio-hover-content">
				  <i class="fa fa-plus fa-3x"></i>
				</div>
			  </div>
			  <img class="img-fluid" src="images/portfolio/05-thumbnail.jpg" alt="">
			</a>
			<div class="portfolio-caption">
			  <h4>Southwest</h4>
			  <p class="text-muted">Website Design</p>
			</div>
		  </div> -->
		  <!-- <div class="col-md-4 col-sm-6 portfolio-item">
			<a class="portfolio-link" data-toggle="modal" href="#portfolioModal6">
			  <div class="portfolio-hover">
				<div class="portfolio-hover-content">
				  <i class="fa fa-plus fa-3x"></i>
				</div>
			  </div>
			  <img class="img-fluid" src="images/portfolio/06-thumbnail.jpg" alt="">
			</a>
			<div class="portfolio-caption">
			  <h4>Window</h4>
			  <p class="text-muted">Photography</p>
			</div>
		  </div>
		</div> -->
	  </div>
	  <div  style="text-align:center">
		<span class="btn-container" >
			<button type="button" onclick="location.href='http://blog.trakkerz.com';" target="_blank" class="btn btn-success">
				Go To Blog
			</button>
		</span>
	  </div><br>
	  </div>
</section>

<section id="contact" class="mbr-section mbr-background" id="testimonials1-7" style="background-color:rgb(244, 244, 244); padding-top: 120px; padding-bottom: 120px;">
<div id="fh5co-features" data-section="contact">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
				<center>
					<h3 class="animate-box mbr-section-title display-2" data-animate-effect="fadeIn">Get in Touch</h3>
					<div class="row animate-box" data-animate-effect="fadeIn">
						<div class="col-md-8 col-md-offset-2">
							<h3>Contact us for a demo</h3>
						</div>
					</div>
					</center>
				</div>              
			</div>
			<br /> <br />
			<div class="row row-bottom-padded-sm">
				<div class="col-md-6 col-sm-6 col-xs-6 col-xxs-12 fh5co-service animate-box" data-animate-effect="fadeIn">
					<div class="fh5co-desc">                                                                        
						<p>
						<b>Address :</b><br> 24, Hemanta Basu Sarani, Suite 309, Mangalam Apt, Block– A, Kolkata 700001<br>
						<b>Email :</b><br> contact@trakkerz.com<br>
						<b>Phone :</b><br> +91-33-4601-4867, +91-8820088000
						</p>
					</div>					
					<div id="map"></div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-6 col-xxs-12 fh5co-service animate-box" data-animate-effect="fadeIn">
					<div class="fh5co-desc">    
						<div class="row">                   
						<form name="sentMessage" id="contactForm" method="post" action="index.php">                            
								<div class="col-md-12">
									<div class="form-group">
										<input name="uname" type="text" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
										<p class="help-block text-danger"></p>
									</div>
									<div class="form-group">
										<input name="uemail" type="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
										<p class="help-block text-danger"></p>
									</div>
									<div class="form-group">
										<input name="utel" type="tel" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">
										<p class="help-block text-danger"></p>
									</div>								
									<div class="form-group">
										<input name="umsg" type="tel" class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."/>
										<p class="help-block text-danger"></p>
										<div class="clearfix"></div>
									<div class="col-lg-12 text-center">
										<div id="success"></div>
										<input type="submit" class="btn btn-success" value="Send Message"/>
									</div>
									</div>
								</div>                            
						</form>
						</div>
					</div>
				</div>              
				<div class="col-lg-1"></div>
			</div>
		</div>
</div>
</section>

<!-- <section class="mbr-section" id="pricing-table2-f" style="background-color: rgb(255, 255, 255); padding-top: 120px; padding-bottom: 120px;">

	

	<div class="mbr-section mbr-section__container mbr-section__container--middle">
	  <div class="container">
		  <div class="row">
			  <div class="col-xs-12 text-xs-center">
				  <h3 class="mbr-section-title display-2">HOW MUCH DOES IT COST?</h3>
				  <small class="mbr-section-subtitle">Pricing table with four columns and solid color background.</small>
			  </div>
		  </div>
	  </div>
	</div>

	<div class="mbr-section mbr-section-nopadding mbr-price-table">
	  <div class="row">
			<div class="col-xs-12 col-md-6 col-xl-4">
				<div class="mbr-plan card text-xs-center">
					<div class="mbr-plan-header card-block">
					  
					  <div class="card-title">
						<h3 class="mbr-plan-title">MONTHLY PLAN</h3>
						<small class="mbr-plan-subtitle">Description</small>
					  </div>
					  <div class="card-text">
						  <div class="mbr-price">
							<span class="mbr-price-value">$</span>
							<span class="mbr-price-figure">1</span><small class="mbr-price-term">/mo.</small>
						  </div>
						  <small class="mbr-plan-price-desc">More details</small>
					  </div>
					</div>
					<div class="mbr-plan-body card-block">
					  <div class="mbr-plan-list"><ul class="list-group list-group-flush"><li class="list-group-item">32 GB storage</li><li class="list-group-item">Unlimited users</li><li class="list-group-item">15 GB bandwidth</li></ul></div>
					  <div class="mbr-plan-btn"><a href="#" class="btn btn-black btn-black-outline">DEMO</a></div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-xl-4">
				<div class="mbr-plan card text-xs-center">
					<div class="mbr-plan-header card-block bg-primary">
					  <div class="mbr-plan-label">HOT!</div>
					  <div class="card-title">
						<h3 class="mbr-plan-title">QUARTERY PLAN</h3>
						<small class="mbr-plan-subtitle">Description</small>
					  </div>
					  <div class="card-text">
						  <div class="mbr-price">
							<span class="mbr-price-value">$</span>
							<span class="mbr-price-figure">0.75</span><small class="mbr-price-term">/mo.</small>
						  </div>
						  <small class="mbr-plan-price-desc">More details</small>
					  </div>
					</div>
					<div class="mbr-plan-body card-block">
					  <div class="mbr-plan-list"><ul class="list-group list-group-flush"><li class="list-group-item">32 GB storage</li><li class="list-group-item">Unlimited users</li><li class="list-group-item">15 GB bandwidth</li></ul></div>
					  <div class="mbr-plan-btn"><a href="#" class="btn btn-black btn-black-outline">DEMO</a></div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-xl-4">
				<div class="mbr-plan card text-xs-center">
					<div class="mbr-plan-header card-block">
					  
					  <div class="card-title">
						<h3 class="mbr-plan-title">ANNUAL PLAN</h3>
						<small class="mbr-plan-subtitle">Description</small>
					  </div>
					  <div class="card-text">
						  <div class="mbr-price">
							<span class="mbr-price-value">$</span>
							<span class="mbr-price-figure">0.5</span><small class="mbr-price-term">/mo.</small>
						  </div>
						  <small class="mbr-plan-price-desc">More details</small>
					  </div>
					</div>
					<div class="mbr-plan-body card-block">
					  <div class="mbr-plan-list"><ul class="list-group list-group-flush"><li class="list-group-item">32 GB storage</li><li class="list-group-item">Unlimited users</li><li class="list-group-item">15 GB bandwidth</li></ul></div>
					  <div class="mbr-plan-btn"><a href="#" class="btn btn-black btn-black-outline">DEMO</a></div>
					</div>
				</div>
			</div>
			
		  </div>
	</div>

</section> -->

<section class="mbr-section article mbr-parallax-background" id="msg-box3-g" style="background-image: url(assets/images/mbr-5.jpg); padding-top: 120px; padding-bottom: 120px;">

	<div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(255, 255, 255);"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-xs-center">
				<h3 class="mbr-section-title display-1">DOWNLOAD NOW</h3>
				
				<div><!-- <a class="btn btn-black" href="#">IPHONE</a>  --><a class="btn btn-black" href="http://bit.ly/2xyfvoN">GET IT ON ANDROID</a></div>
			</div>
		</div>
	</div>

</section>

<section class="mbr-section article" id="msg-box22-g" style="padding-top: 40px; padding-bottom: 20px;">

	<div class="mbr-overlay" style="background-color: #f4f4f4;">
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-xs-center">
				<p>(c) 2017 All Rights Reserved <a  href="http://trakkerz.com" style="color:#333;text-decoration:underline;"> Trakkerz</a></p>
			</div>
		</div>
	</div>

</section>

  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/smooth-scroll.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/touch-swipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/viewport-checker/jquery.viewportchecker.js"></script>
  <script src="assets/jarallax/jarallax.js"></script>
  <script src="assets/theme/js/script.js"></script>
  
  
  <input name="animation" type="hidden"/>
  <script type="text/javascript">
	window._urq = window._urq || [];
	_urq.push(['initSite', '09d32d73-e00a-4031-9226-09650dfd5e10']);
	(function() 
	{
	var ur = document.createElement('script'); ur.type = 'text/javascript'; ur.async = true;
	ur.src = ('https:' == document.location.protocol ? 'https://cdn.userreport.com/userreport.js' : 'http://cdn.userreport.com/userreport.js');
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ur, s);
	})();
  </script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108223328-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-108223328-1');
</script>  
  </body>
</html>