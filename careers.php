<?php
if($_POST && isset($_FILES['my_file']))
{
	//$from_email         = 'noreply@your_domain.com'; //from mail, it is mandatory with some hosts
	$recipient_email    = 'careers@trakkerz.com'; //recipient email (most cases it is your personal email)
	
	//Capture POST data from HTML form and Sanitize them, 
	$form_name    = filter_var($_POST["formValue"], FILTER_SANITIZE_STRING); //sender name
	$sender_name    = filter_var($_POST["sender_name"], FILTER_SANITIZE_STRING); //sender name
	$reply_to_email = filter_var($_POST["sender_email"], FILTER_SANITIZE_STRING); //sender email used in "reply-to" header
	$subject        = filter_var("Trakkerz Career page", FILTER_SANITIZE_STRING); //get subject from HTML form
	$mobile        = filter_var($_POST["number"], FILTER_SANITIZE_STRING); //message
	
	/* //don't forget to validate empty fields 
	if(strlen($sender_name)<1){
		die('Name is too short or empty!');
	} 
	*/
	
	//Get uploaded file data
	$file_tmp_name    = $_FILES['my_file']['tmp_name'];
	$file_name        = $_FILES['my_file']['name'];
	$file_size        = $_FILES['my_file']['size'];
	$file_type        = $_FILES['my_file']['type'];
	$file_error       = $_FILES['my_file']['error'];

	if($file_error > 0)
	{
		die('Upload error or No files uploaded');
	}
	//read from the uploaded file & base64_encode content for the mail
	$handle = fopen($file_tmp_name, "r");
	$content = fread($handle, $file_size);
	fclose($handle);
	$encoded_content = chunk_split(base64_encode($content));

		$boundary = md5("sanwebe");
		//header
		$headers = "MIME-Version: 1.0\r\n"; 
		//$headers .= "From:".$from_email."\r\n"; 
		$headers .= "Reply-To: ".$reply_to_email."" . "\r\n";
		$headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n"; 
		
		//plain text 
		$body = "--$boundary\r\n";
		$body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
		$body .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
		$data1 = "Candidate Name: ".$sender_name;
		$data1 .= "\r\n Mail Id: ".$reply_to_email;
		$data1 .= "\r\n Ph: ".$mobile;
		$data1 .= "\r\n Position: ".$form_name;
		// //plain text 
		// $body = "--$boundary\r\n";
		// $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
		// $body .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
		// $body .= chunk_split(base64_encode($sender_name));
		// $body .= chunk_split(base64_encode($reply_to_email));
		// $body .= chunk_split(base64_encode($mobile));
		$body .= chunk_split(base64_encode($data1));
		
		//attachment
		$body .= "--$boundary\r\n";
		$body .="Content-Type: $file_type; name=".$file_name."\r\n";
		$body .="Content-Disposition: attachment; filename=".$file_name."\r\n";
		$body .="Content-Transfer-Encoding: base64\r\n";
		$body .="X-Attachment-Id: ".rand(1000,99999)."\r\n\r\n"; 
		$body .= $encoded_content; 
	
	$sentMail = @mail($recipient_email, $subject, $body, $headers);
	if($sentMail) //output success or failure messages
	{       
		die('<div align="center" style="font-size:30px;color:Blue;font-weight:bold;vertical-align:middle;text-align:center;"><br><br><br><br>Thank you for applying to Trakkerz!<br></div><div align="center" style="font-size:20px;color:black;vertical-align:middle;text-align:center;">You will hear from us shortly.</div>');

	}else{
		die('Could not send mail! Please check your PHP mail configuration.');  
	}

}
?>
<!DOCTYPE html>
	<html lang="en-US">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="assets/images/trakkerzwhite.png" type="image/x-icon">
	<meta name="description" content="India's one and only mobile App that allows you to track anything, anywhere, anytime! It is a GPS Tracker App. Track School Bus, Track Salesman, Track Package and Track Friends and Family">
	<meta name="keywords" content="bus, school bus, gps, bus tracker, gps tracker, mobile tracker, delivery, india, digital india, track package">

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="shortcut icon" href="assets/images/trakkerzwhite.png" type="image/x-icon">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"/>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
<style>
	.table a
	{
		color:#4373bb;
		text-decoration:none;
		cursor:pointer;
	}
	.footer 
	{
	  /*background: #061D25;*/
	  padding: 10px 0;
	}

	.footer a 
	{
	  color: #70726F;
	  font-size: 20px;
	  padding: 10px;
	  /*border-right: 1px solid #70726F;*/
	  transition: all .5s ease;
	}

	.footer a:first-child 
	{
	  /*border-left: 1px solid #70726F;*/
	}

	.footer a:hover 
	{
	  color: white;
	}
</style>
<script>
	$(document).ready(function(){
		$("button").click(function(){
			$("p").toggle();
		});
	});
</script>

</head>
<body>
	<div class="container-fluid">
		<h2 style="color:#4373bb">Careers</h2>  
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
					<img src="1.jpg" alt="Los Angeles" style="width:100%;">
				</div>

				<div class="item">
					<img src="2.jpg" alt="Chicago" style="width:100%;">
				</div>

				<div class="item">
					<img src="3.jpg" alt="New york" style="width:100%;">
				</div>
			</div>

			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">
					Previous
				</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">
					Next
				</span>
			</a>
		</div>
	</div>
<br/>
<div class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12 text-left middle-block" style="text-align: justify;">
			<h3 class="new-style" style="color:#4373bb">Join the Trakkerz Team!</h3>

			<p>If security seems to be on the other side of the shore, then all we need to do is to set sail on the boat named "TRAKKERZ".  We, in Trakkerz, help people stay connected to each other on the go all across the country. We are expanding our horizon at a very fast rate, one city at a time!</p>

			<p>In TRAKKERZ, we provide a growing atmosphere, under the guidance of our expert professionals, ensuring that you grow and thrive. You get the chance to be the medium of change for the entire environment as "Safety of an individual is of the ultimate importance".</p>

			<p>In TRAKKERZ, we are looking for friends who are willing to be the change and would value our customer at every moment. The key tenet of all our process is "Customer Centricity."</p>

			<p>If this sounds interesting and if you are excited to be a part of us, then now is a perfect time.</p>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 col-sm-12 text-left middle-block">
			<br>
			<h4 class="new-style" style="color:#4373bb">
				Open Positions
			</h4>
			<br>
		</div>
	</div>

	<div class="col-md-12 col-sm-12 container">
		<h4>Assam</h4>

		<table class="table">
			<thead>
				<tr>
					<th>Role</th>
					<th>Functional Area</th>
					<th>Experience</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Marketing Executive</td>
					<td>Marketing</td>
					<td>2-5 Years</td>
					<td>
						<a data-toggle="collapse" data-target="#demo1">
							<b><span>+</span> View Details</b>
						</a>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<div id="demo1" class="collapse">
							<b>Job Description:</b><br><br>

							Trakkerz sells mobile apps to Schools and Companies.<br>

							We are looking for a competitive and trustworthy Sales Executive/Manager to help us build up our business activities. You will be responsible for discovering and pursuing new sales prospects and maintaining customer satisfaction.<br>

							The goal is to meet and surpass the company’s expectations to drive rapid and sustainable growth.<br><br>

							<b>Responsibilities:</b><br><br>

							<ul>
								<li>Conduct market research to identify selling possibilities and evaluate customer needs.</li>
							<li>Actively seek out new sales opportunities through cold calling, networking, and social media.</li>
							<li>Set up meetings with potential clients and listen to their wishes and concerns.</li>
							<li>Prepare and deliver appropriate presentations on products/ services.</li>
							<li>Create frequent reviews and reports with sales and financial data.</li>
							<li>Participate on behalf of the company in exhibitions or conferences.</li>
							<li>Negotiate/close deals and handle complaints or objections.</li>
							<li>Collaborate with team to achieve better results.</li></ul>

							<b>Requirements:</b><br><br>

							<ul><li>Proven experience as a sales executive or relevant role.</li>
							<li>Proficiency in English.</li>
							<li>Working knowledge of MS Office.</li>
							<li>Thorough understanding of marketing and negotiating techniques.</li>
							<li>Fast learner and passion for sales.</li>
							<li>Self-motivated with a results-driven approach.</li>
							<li>Aptitude in delivering attractive presentations.</li>
							<li>High school degree.</li>
							<li>Proficiency in use of Facebook, Whatsapp.</li>
							<li>Work experience in Education sector is preferable.</li></ul>

							<form id="form1" enctype="multipart/form-data" method="POST" action="">
								<div class="col-md-12">
									<!-- <div class="form-group"> -->
										<input type="hidden" name="formValue" value="Marketing Executive for Assam"/>

										<label>Name<span style="color:red">*</span> <input type="text" name="sender_name" class="form-control" required data-validation-required-message="Please enter your name." /> </label>
										<!-- <p class="help-block text-danger"></p> -->
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label>Email<span style="color:red">*</span> <input type="email" name="sender_email" class="form-control" required data-validation-required-message="Please enter your email address." /> </label><br>
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label>Mobile<span style="color:red">*</span> <input name="number" type="number" class="form-control" oninput="maxLengthCheck(this)" min = "1111111111"
max = "9999999999" required data-validation-required-message="Please enter your phone number."/></label>
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label class="control-label">Resume<span style="color:red">*</span><span style="font-size: 13px; font-weight: 300;"> (pdf, doc, docx - Under 2MB)</span> <input onchange="return ValidateSize(this)" id="resume" type="file" accept=".pdf, .doc, .docx" name="my_file" /></label><br>
									<!-- </div> -->
									<label><input type="submit" class="btn btn-success" name="button" value="Submit" /></label><br>
								</div>
							</form>
						</div>
					</td>
				</tr>
				
			</tbody>
		</table>
		<h4>Bihar</h4>

		<table class="table">
			<thead>
				<tr>
					<th>Role</th>
					<th>Functional Area</th>
					<th>Experience</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Marketing Executive</td>
					<td>Marketing</td>
					<td>2-5 Years</td>
					<td>
						<a data-toggle="collapse" data-target="#demo2">
							<b><span>+</span> View Details</b>
						</a>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<div id="demo2" class="collapse">
							<b>Job Description:</b><br><br>

							Trakkerz sells mobile apps to Schools and Companies.<br>

							We are looking for a competitive and trustworthy Sales Executive/Manager to help us build up our business activities. You will be responsible for discovering and pursuing new sales prospects and maintaining customer satisfaction.<br>

							The goal is to meet and surpass the company’s expectations to drive rapid and sustainable growth.<br><br>

							<b>Responsibilities:</b><br><br>

							<ul>
								<li>Conduct market research to identify selling possibilities and evaluate customer needs.</li>
							<li>Actively seek out new sales opportunities through cold calling, networking, and social media.</li>
							<li>Set up meetings with potential clients and listen to their wishes and concerns.</li>
							<li>Prepare and deliver appropriate presentations on products/ services.</li>
							<li>Create frequent reviews and reports with sales and financial data.</li>
							<li>Participate on behalf of the company in exhibitions or conferences.</li>
							<li>Negotiate/close deals and handle complaints or objections.</li>
							<li>Collaborate with team to achieve better results.</li></ul>

							<b>Requirements:</b><br><br>

							<ul><li>Proven experience as a sales executive or relevant role.</li>
							<li>Proficiency in English.</li>
							<li>Working knowledge of MS Office.</li>
							<li>Thorough understanding of marketing and negotiating techniques.</li>
							<li>Fast learner and passion for sales.</li>
							<li>Self-motivated with a results-driven approach.</li>
							<li>Aptitude in delivering attractive presentations.</li>
							<li>High school degree.</li>
							<li>Proficiency in use of Facebook, Whatsapp.</li>
							<li>Work experience in Education sector is preferable.</li></ul>

							<form id="form2" enctype="multipart/form-data" method="POST" action="">
								<div class="col-md-12">
									<!-- <div class="form-group"> -->
										<input type="hidden" name="formValue" value="Marketing Executive for Bihar"/>

										<label>Name<span style="color:red">*</span> <input type="text" name="sender_name" class="form-control" required data-validation-required-message="Please enter your name." /> </label>
										<!-- <p class="help-block text-danger"></p> -->
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label>Email<span style="color:red">*</span> <input type="email" name="sender_email" class="form-control" required data-validation-required-message="Please enter your email address." /> </label><br>
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label>Mobile<span style="color:red">*</span> <input name="number" type="number" class="form-control" oninput="maxLengthCheck(this)" min = "1111111111"
max = "9999999999" required data-validation-required-message="Please enter your phone number."/></label>
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label class="control-label">Resume<span style="color:red">*</span><span style="font-size: 13px; font-weight: 300;"> (pdf, doc, docx - Under 2MB)</span> <input onchange="return ValidateSize(this)" id="resume" type="file" accept=".pdf, .doc, .docx" name="my_file" /></label><br>
									<!-- </div> -->
									<label><input type="submit" class="btn btn-success" name="button" value="Submit" /></label><br>
								</div>
							</form>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		<h4>Chattishgarh</h4>

		<table class="table">
			<thead>
				<tr>
					<th>Role</th>
					<th>Functional Area</th>
					<th>Experience</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Marketing Executive</td>
					<td>Marketing</td>
					<td>2-5 Years</td>
					<td>
						<a data-toggle="collapse" data-target="#demo3">
							<b><span>+</span> View Details</b>
						</a>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<div id="demo3" class="collapse">
							<b>Job Description:</b><br><br>

							Trakkerz sells mobile apps to Schools and Companies.<br>

							We are looking for a competitive and trustworthy Sales Executive/Manager to help us build up our business activities. You will be responsible for discovering and pursuing new sales prospects and maintaining customer satisfaction.<br>

							The goal is to meet and surpass the company’s expectations to drive rapid and sustainable growth.<br><br>

							<b>Responsibilities:</b><br><br>

							<ul>
								<li>Conduct market research to identify selling possibilities and evaluate customer needs.</li>
							<li>Actively seek out new sales opportunities through cold calling, networking, and social media.</li>
							<li>Set up meetings with potential clients and listen to their wishes and concerns.</li>
							<li>Prepare and deliver appropriate presentations on products/ services.</li>
							<li>Create frequent reviews and reports with sales and financial data.</li>
							<li>Participate on behalf of the company in exhibitions or conferences.</li>
							<li>Negotiate/close deals and handle complaints or objections.</li>
							<li>Collaborate with team to achieve better results.</li></ul>

							<b>Requirements:</b><br><br>

							<ul><li>Proven experience as a sales executive or relevant role.</li>
							<li>Proficiency in English.</li>
							<li>Working knowledge of MS Office.</li>
							<li>Thorough understanding of marketing and negotiating techniques.</li>
							<li>Fast learner and passion for sales.</li>
							<li>Self-motivated with a results-driven approach.</li>
							<li>Aptitude in delivering attractive presentations.</li>
							<li>High school degree.</li>
							<li>Proficiency in use of Facebook, Whatsapp.</li>
							<li>Work experience in Education sector is preferable.</li></ul>

							<form id="form3" enctype="multipart/form-data" method="POST" action="">
								<div class="col-md-12">
									<!-- <div class="form-group"> -->
										<input type="hidden" name="formValue" value="Marketing Executive for Chattishgarh"/>

										<label>Name<span style="color:red">*</span> <input type="text" name="sender_name" class="form-control" required data-validation-required-message="Please enter your name." /> </label>
										<!-- <p class="help-block text-danger"></p> -->
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label>Email<span style="color:red">*</span> <input type="email" name="sender_email" class="form-control" required data-validation-required-message="Please enter your email address." /> </label><br>
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label>Mobile<span style="color:red">*</span> <input name="number" type="number" class="form-control" oninput="maxLengthCheck(this)" min = "1111111111"
max = "9999999999" required data-validation-required-message="Please enter your phone number."/></label>
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label class="control-label">Resume<span style="color:red">*</span><span style="font-size: 13px; font-weight: 300;"> (pdf, doc, docx - Under 2MB)</span> <input onchange="return ValidateSize(this)" id="resume" type="file" accept=".pdf, .doc, .docx" name="my_file" /></label><br>
									<!-- </div> -->
									<label><input type="submit" class="btn btn-success" name="button" value="Submit" /></label><br>
								</div>
							</form>
						</div>
					</td>
				</tr>
				
			</tbody>
		</table>
		<h4>Delhi</h4>

		<table class="table">
			<thead>
				<tr>
					<th>Role</th>
					<th>Functional Area</th>
					<th>Experience</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Marketing Executive</td>
					<td>Marketing</td>
					<td>2-5 Years</td>
					<td>
						<a data-toggle="collapse" data-target="#demo4">
							<b><span>+</span> View Details</b>
						</a>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<div id="demo4" class="collapse">
							<b>Job Description:</b><br><br>

							Trakkerz sells mobile apps to Schools and Companies.<br>

							We are looking for a competitive and trustworthy Sales Executive/Manager to help us build up our business activities. You will be responsible for discovering and pursuing new sales prospects and maintaining customer satisfaction.<br>

							The goal is to meet and surpass the company’s expectations to drive rapid and sustainable growth.<br><br>

							<b>Responsibilities:</b><br><br>

							<ul>
								<li>Conduct market research to identify selling possibilities and evaluate customer needs.</li>
							<li>Actively seek out new sales opportunities through cold calling, networking, and social media.</li>
							<li>Set up meetings with potential clients and listen to their wishes and concerns.</li>
							<li>Prepare and deliver appropriate presentations on products/ services.</li>
							<li>Create frequent reviews and reports with sales and financial data.</li>
							<li>Participate on behalf of the company in exhibitions or conferences.</li>
							<li>Negotiate/close deals and handle complaints or objections.</li>
							<li>Collaborate with team to achieve better results.</li></ul>

							<b>Requirements:</b><br><br>

							<ul><li>Proven experience as a sales executive or relevant role.</li>
							<li>Proficiency in English.</li>
							<li>Working knowledge of MS Office.</li>
							<li>Thorough understanding of marketing and negotiating techniques.</li>
							<li>Fast learner and passion for sales.</li>
							<li>Self-motivated with a results-driven approach.</li>
							<li>Aptitude in delivering attractive presentations.</li>
							<li>High school degree.</li>
							<li>Proficiency in use of Facebook, Whatsapp.</li>
							<li>Work experience in Education sector is preferable.</li></ul>

							<form id="form4" enctype="multipart/form-data" method="POST" action="">
								<div class="col-md-12">
									<!-- <div class="form-group"> -->
										<input type="hidden" name="formValue" value="Marketing Executive for Delhi"/>

										<label>Name<span style="color:red">*</span> <input type="text" name="sender_name" class="form-control" required data-validation-required-message="Please enter your name." /> </label>
										<!-- <p class="help-block text-danger"></p> -->
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label>Email<span style="color:red">*</span> <input type="email" name="sender_email" class="form-control" required data-validation-required-message="Please enter your email address." /> </label><br>
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label>Mobile<span style="color:red">*</span> <input name="number" type="number" class="form-control" oninput="maxLengthCheck(this)" min = "1111111111"
max = "9999999999" required data-validation-required-message="Please enter your phone number."/></label>
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label class="control-label">Resume<span style="color:red">*</span><span style="font-size: 13px; font-weight: 300;"> (pdf, doc, docx - Under 2MB)</span> <input onchange="return ValidateSize(this)" id="resume" type="file" accept=".pdf, .doc, .docx" name="my_file" /></label><br>
									<!-- </div> -->
									<label><input type="submit" class="btn btn-success" name="button" value="Submit" /></label><br>
								</div>
							</form>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		<h4>Haryana</h4>

		<table class="table">
			<thead>
				<tr>
					<th>Role</th>
					<th>Functional Area</th>
					<th>Experience</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Marketing Executive</td>
					<td>Marketing</td>
					<td>2-5 Years</td>
					<td>
						<a data-toggle="collapse" data-target="#demo5">
							<b><span>+</span> View Details</b>
						</a>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<div id="demo5" class="collapse">
							<b>Job Description:</b><br><br>

							Trakkerz sells mobile apps to Schools and Companies.<br>

							We are looking for a competitive and trustworthy Sales Executive/Manager to help us build up our business activities. You will be responsible for discovering and pursuing new sales prospects and maintaining customer satisfaction.<br>

							The goal is to meet and surpass the company’s expectations to drive rapid and sustainable growth.<br><br>

							<b>Responsibilities:</b><br><br>

							<ul>
								<li>Conduct market research to identify selling possibilities and evaluate customer needs.</li>
							<li>Actively seek out new sales opportunities through cold calling, networking, and social media.</li>
							<li>Set up meetings with potential clients and listen to their wishes and concerns.</li>
							<li>Prepare and deliver appropriate presentations on products/ services.</li>
							<li>Create frequent reviews and reports with sales and financial data.</li>
							<li>Participate on behalf of the company in exhibitions or conferences.</li>
							<li>Negotiate/close deals and handle complaints or objections.</li>
							<li>Collaborate with team to achieve better results.</li></ul>

							<b>Requirements:</b><br><br>

							<ul><li>Proven experience as a sales executive or relevant role.</li>
							<li>Proficiency in English.</li>
							<li>Working knowledge of MS Office.</li>
							<li>Thorough understanding of marketing and negotiating techniques.</li>
							<li>Fast learner and passion for sales.</li>
							<li>Self-motivated with a results-driven approach.</li>
							<li>Aptitude in delivering attractive presentations.</li>
							<li>High school degree.</li>
							<li>Proficiency in use of Facebook, Whatsapp.</li>
							<li>Work experience in Education sector is preferable.</li></ul>

							<form id="form5" enctype="multipart/form-data" method="POST" action="">
								<div class="col-md-12">
									<!-- <div class="form-group"> -->
										<input type="hidden" name="formValue" value="Marketing Executive for Haryana"/>

										<label>Name<span style="color:red">*</span> <input type="text" name="sender_name" class="form-control" required data-validation-required-message="Please enter your name." /> </label>
										<!-- <p class="help-block text-danger"></p> -->
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label>Email<span style="color:red">*</span> <input type="email" name="sender_email" class="form-control" required data-validation-required-message="Please enter your email address." /> </label><br>
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label>Mobile<span style="color:red">*</span> <input name="number" type="number" class="form-control" oninput="maxLengthCheck(this)" min = "1111111111"
max = "9999999999" required data-validation-required-message="Please enter your phone number."/></label>
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label class="control-label">Resume<span style="color:red">*</span><span style="font-size: 13px; font-weight: 300;"> (pdf, doc, docx - Under 2MB)</span> <input onchange="return ValidateSize(this)" id="resume" type="file" accept=".pdf, .doc, .docx" name="my_file" /></label><br>
									<!-- </div> -->
									<label><input type="submit" class="btn btn-success" name="button" value="Submit" /></label><br>
								</div>
							</form>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		<h4>Jharkhand</h4>

		<table class="table">
			<thead>
				<tr>
					<th>Role</th>
					<th>Functional Area</th>
					<th>Experience</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Marketing Executive</td>
					<td>Marketing</td>
					<td>2-5 Years</td>
					<td>
						<a data-toggle="collapse" data-target="#demo6">
							<b><span>+</span> View Details</b>
						</a>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<div id="demo6" class="collapse">
							<b>Job Description:</b><br><br>

							Trakkerz sells mobile apps to Schools and Companies.<br>

							We are looking for a competitive and trustworthy Sales Executive/Manager to help us build up our business activities. You will be responsible for discovering and pursuing new sales prospects and maintaining customer satisfaction.<br>

							The goal is to meet and surpass the company’s expectations to drive rapid and sustainable growth.<br><br>

							<b>Responsibilities:</b><br><br>

							<ul>
								<li>Conduct market research to identify selling possibilities and evaluate customer needs.</li>
							<li>Actively seek out new sales opportunities through cold calling, networking, and social media.</li>
							<li>Set up meetings with potential clients and listen to their wishes and concerns.</li>
							<li>Prepare and deliver appropriate presentations on products/ services.</li>
							<li>Create frequent reviews and reports with sales and financial data.</li>
							<li>Participate on behalf of the company in exhibitions or conferences.</li>
							<li>Negotiate/close deals and handle complaints or objections.</li>
							<li>Collaborate with team to achieve better results.</li></ul>

							<b>Requirements:</b><br><br>

							<ul><li>Proven experience as a sales executive or relevant role.</li>
							<li>Proficiency in English.</li>
							<li>Working knowledge of MS Office.</li>
							<li>Thorough understanding of marketing and negotiating techniques.</li>
							<li>Fast learner and passion for sales.</li>
							<li>Self-motivated with a results-driven approach.</li>
							<li>Aptitude in delivering attractive presentations.</li>
							<li>High school degree.</li>
							<li>Proficiency in use of Facebook, Whatsapp.</li>
							<li>Work experience in Education sector is preferable.</li></ul>

							<form id="form6" enctype="multipart/form-data" method="POST" action="">
								<div class="col-md-12">
									<!-- <div class="form-group"> -->
										<input type="hidden" name="formValue" value="Marketing Executive for Jharkhand"/>

										<label>Name<span style="color:red">*</span> <input type="text" name="sender_name" class="form-control" required data-validation-required-message="Please enter your name." /> </label>
										<!-- <p class="help-block text-danger"></p> -->
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label>Email<span style="color:red">*</span> <input type="email" name="sender_email" class="form-control" required data-validation-required-message="Please enter your email address." /> </label><br>
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label>Mobile<span style="color:red">*</span> <input name="number" type="number" class="form-control" oninput="maxLengthCheck(this)" min = "1111111111"
max = "9999999999" required data-validation-required-message="Please enter your phone number."/></label>
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label class="control-label">Resume<span style="color:red">*</span><span style="font-size: 13px; font-weight: 300;"> (pdf, doc, docx - Under 2MB)</span> <input onchange="return ValidateSize(this)" id="resume" type="file" accept=".pdf, .doc, .docx" name="my_file" /></label><br>
									<!-- </div> -->
									<label><input type="submit" class="btn btn-success" name="button" value="Submit" /></label><br>
								</div>
							</form>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		<h4>Madhya Pradesh</h4>

		<table class="table">
			<thead>
				<tr>
					<th>Role</th>
					<th>Functional Area</th>
					<th>Experience</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Marketing Executive</td>
					<td>Marketing</td>
					<td>2-5 Years</td>
					<td>
						<a data-toggle="collapse" data-target="#demo7">
							<b><span>+</span> View Details</b>
						</a>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<div id="demo7" class="collapse">
							<b>Job Description:</b><br><br>

							Trakkerz sells mobile apps to Schools and Companies.<br>

							We are looking for a competitive and trustworthy Sales Executive/Manager to help us build up our business activities. You will be responsible for discovering and pursuing new sales prospects and maintaining customer satisfaction.<br>

							The goal is to meet and surpass the company’s expectations to drive rapid and sustainable growth.<br><br>

							<b>Responsibilities:</b><br><br>

							<ul>
								<li>Conduct market research to identify selling possibilities and evaluate customer needs.</li>
							<li>Actively seek out new sales opportunities through cold calling, networking, and social media.</li>
							<li>Set up meetings with potential clients and listen to their wishes and concerns.</li>
							<li>Prepare and deliver appropriate presentations on products/ services.</li>
							<li>Create frequent reviews and reports with sales and financial data.</li>
							<li>Participate on behalf of the company in exhibitions or conferences.</li>
							<li>Negotiate/close deals and handle complaints or objections.</li>
							<li>Collaborate with team to achieve better results.</li></ul>

							<b>Requirements:</b><br><br>

							<ul><li>Proven experience as a sales executive or relevant role.</li>
							<li>Proficiency in English.</li>
							<li>Working knowledge of MS Office.</li>
							<li>Thorough understanding of marketing and negotiating techniques.</li>
							<li>Fast learner and passion for sales.</li>
							<li>Self-motivated with a results-driven approach.</li>
							<li>Aptitude in delivering attractive presentations.</li>
							<li>High school degree.</li>
							<li>Proficiency in use of Facebook, Whatsapp.</li>
							<li>Work experience in Education sector is preferable.</li></ul>

							<form id="form7" enctype="multipart/form-data" method="POST" action="">
								<div class="col-md-12">
									<!-- <div class="form-group"> -->
										<input type="hidden" name="formValue" value="Marketing Executive for Madhya Pradesh"/>

										<label>Name<span style="color:red">*</span> <input type="text" name="sender_name" class="form-control" required data-validation-required-message="Please enter your name." /> </label>
										<!-- <p class="help-block text-danger"></p> -->
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label>Email<span style="color:red">*</span> <input type="email" name="sender_email" class="form-control" required data-validation-required-message="Please enter your email address." /> </label><br>
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label>Mobile<span style="color:red">*</span> <input name="number" type="number" class="form-control" oninput="maxLengthCheck(this)" min = "1111111111"
max = "9999999999" required data-validation-required-message="Please enter your phone number."/></label>
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label class="control-label">Resume<span style="color:red">*</span><span style="font-size: 13px; font-weight: 300;"> (pdf, doc, docx - Under 2MB)</span> <input onchange="return ValidateSize(this)" id="resume" type="file" accept=".pdf, .doc, .docx" name="my_file" /></label><br>
									<!-- </div> -->
									<label><input type="submit" class="btn btn-success" name="button" value="Submit" /></label><br>
								</div>
							</form>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		<h4>Maharashtra</h4>

		<table class="table">
			<thead>
				<tr>
					<th>Role</th>
					<th>Functional Area</th>
					<th>Experience</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Marketing Executive</td>
					<td>Marketing</td>
					<td>2-5 Years</td>
					<td>
						<a data-toggle="collapse" data-target="#demo8">
							<b><span>+</span> View Details</b>
						</a>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<div id="demo8" class="collapse">
							<b>Job Description:</b><br><br>

							Trakkerz sells mobile apps to Schools and Companies.<br>

							We are looking for a competitive and trustworthy Sales Executive/Manager to help us build up our business activities. You will be responsible for discovering and pursuing new sales prospects and maintaining customer satisfaction.<br>

							The goal is to meet and surpass the company’s expectations to drive rapid and sustainable growth.<br><br>

							<b>Responsibilities:</b><br><br>

							<ul>
								<li>Conduct market research to identify selling possibilities and evaluate customer needs.</li>
							<li>Actively seek out new sales opportunities through cold calling, networking, and social media.</li>
							<li>Set up meetings with potential clients and listen to their wishes and concerns.</li>
							<li>Prepare and deliver appropriate presentations on products/ services.</li>
							<li>Create frequent reviews and reports with sales and financial data.</li>
							<li>Participate on behalf of the company in exhibitions or conferences.</li>
							<li>Negotiate/close deals and handle complaints or objections.</li>
							<li>Collaborate with team to achieve better results.</li></ul>

							<b>Requirements:</b><br><br>

							<ul><li>Proven experience as a sales executive or relevant role.</li>
							<li>Proficiency in English.</li>
							<li>Working knowledge of MS Office.</li>
							<li>Thorough understanding of marketing and negotiating techniques.</li>
							<li>Fast learner and passion for sales.</li>
							<li>Self-motivated with a results-driven approach.</li>
							<li>Aptitude in delivering attractive presentations.</li>
							<li>High school degree.</li>
							<li>Proficiency in use of Facebook, Whatsapp.</li>
							<li>Work experience in Education sector is preferable.</li></ul>

							<form id="form8" enctype="multipart/form-data" method="POST" action="">
								<div class="col-md-12">
									<!-- <div class="form-group"> -->
										<input type="hidden" name="formValue" value="Marketing Executive for Maharashtra"/>

										<label>Name<span style="color:red">*</span> <input type="text" name="sender_name" class="form-control" required data-validation-required-message="Please enter your name." /> </label>
										<!-- <p class="help-block text-danger"></p> -->
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label>Email<span style="color:red">*</span> <input type="email" name="sender_email" class="form-control" required data-validation-required-message="Please enter your email address." /> </label><br>
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label>Mobile<span style="color:red">*</span> <input name="number" type="number" class="form-control" oninput="maxLengthCheck(this)" min = "1111111111"
max = "9999999999" required data-validation-required-message="Please enter your phone number."/></label>
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label class="control-label">Resume<span style="color:red">*</span><span style="font-size: 13px; font-weight: 300;"> (pdf, doc, docx - Under 2MB)</span> <input onchange="return ValidateSize(this)" id="resume" type="file" accept=".pdf, .doc, .docx" name="my_file" /></label><br>
									<!-- </div> -->
									<label><input type="submit" class="btn btn-success" name="button" value="Submit" /></label><br>
								</div>
							</form>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		<h4>Orrisa</h4>

		<table class="table">
			<thead>
				<tr>
					<th>Role</th>
					<th>Functional Area</th>
					<th>Experience</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Marketing Executive</td>
					<td>Marketing</td>
					<td>2-5 Years</td>
					<td>
						<a data-toggle="collapse" data-target="#demo9">
							<b><span>+</span> View Details</b>
						</a>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<div id="demo9" class="collapse">
							<b>Job Description:</b><br><br>

							Trakkerz sells mobile apps to Schools and Companies.<br>

							We are looking for a competitive and trustworthy Sales Executive/Manager to help us build up our business activities. You will be responsible for discovering and pursuing new sales prospects and maintaining customer satisfaction.<br>

							The goal is to meet and surpass the company’s expectations to drive rapid and sustainable growth.<br><br>

							<b>Responsibilities:</b><br><br>

							<ul>
								<li>Conduct market research to identify selling possibilities and evaluate customer needs.</li>
							<li>Actively seek out new sales opportunities through cold calling, networking, and social media.</li>
							<li>Set up meetings with potential clients and listen to their wishes and concerns.</li>
							<li>Prepare and deliver appropriate presentations on products/ services.</li>
							<li>Create frequent reviews and reports with sales and financial data.</li>
							<li>Participate on behalf of the company in exhibitions or conferences.</li>
							<li>Negotiate/close deals and handle complaints or objections.</li>
							<li>Collaborate with team to achieve better results.</li></ul>

							<b>Requirements:</b><br><br>

							<ul><li>Proven experience as a sales executive or relevant role.</li>
							<li>Proficiency in English.</li>
							<li>Working knowledge of MS Office.</li>
							<li>Thorough understanding of marketing and negotiating techniques.</li>
							<li>Fast learner and passion for sales.</li>
							<li>Self-motivated with a results-driven approach.</li>
							<li>Aptitude in delivering attractive presentations.</li>
							<li>High school degree.</li>
							<li>Proficiency in use of Facebook, Whatsapp.</li>
							<li>Work experience in Education sector is preferable.</li></ul>

							<form id="form9" enctype="multipart/form-data" method="POST" action="">
								<div class="col-md-12">
									<!-- <div class="form-group"> -->
										<input type="hidden" name="formValue" value="Marketing Executive for Orrisa"/>

										<label>Name<span style="color:red">*</span> <input type="text" name="sender_name" class="form-control" required data-validation-required-message="Please enter your name." /> </label>
										<!-- <p class="help-block text-danger"></p> -->
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label>Email<span style="color:red">*</span> <input type="email" name="sender_email" class="form-control" required data-validation-required-message="Please enter your email address." /> </label><br>
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label>Mobile<span style="color:red">*</span> <input name="number" type="number" class="form-control" oninput="maxLengthCheck(this)" min = "1111111111"
max = "9999999999" required data-validation-required-message="Please enter your phone number."/></label>
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label class="control-label">Resume<span style="color:red">*</span><span style="font-size: 13px; font-weight: 300;"> (pdf, doc, docx - Under 2MB)</span> <input onchange="return ValidateSize(this)" id="resume" type="file" accept=".pdf, .doc, .docx" name="my_file" /></label><br>
									<!-- </div> -->
									<label><input type="submit" class="btn btn-success" name="button" value="Submit" /></label><br>
								</div>
							</form>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		<h4>Sikkhim</h4>

		<table class="table">
			<thead>
				<tr>
					<th>Role</th>
					<th>Functional Area</th>
					<th>Experience</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Marketing Executive</td>
					<td>Marketing</td>
					<td>2-5 Years</td>
					<td>
						<a data-toggle="collapse" data-target="#demo10">
							<b><span>+</span> View Details</b>
						</a>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<div id="demo10" class="collapse">
							<b>Job Description:</b><br><br>

							Trakkerz sells mobile apps to Schools and Companies.<br>

							We are looking for a competitive and trustworthy Sales Executive/Manager to help us build up our business activities. You will be responsible for discovering and pursuing new sales prospects and maintaining customer satisfaction.<br>

							The goal is to meet and surpass the company’s expectations to drive rapid and sustainable growth.<br><br>

							<b>Responsibilities:</b><br><br>

							<ul>
								<li>Conduct market research to identify selling possibilities and evaluate customer needs.</li>
							<li>Actively seek out new sales opportunities through cold calling, networking, and social media.</li>
							<li>Set up meetings with potential clients and listen to their wishes and concerns.</li>
							<li>Prepare and deliver appropriate presentations on products/ services.</li>
							<li>Create frequent reviews and reports with sales and financial data.</li>
							<li>Participate on behalf of the company in exhibitions or conferences.</li>
							<li>Negotiate/close deals and handle complaints or objections.</li>
							<li>Collaborate with team to achieve better results.</li></ul>

							<b>Requirements:</b><br><br>

							<ul><li>Proven experience as a sales executive or relevant role.</li>
							<li>Proficiency in English.</li>
							<li>Working knowledge of MS Office.</li>
							<li>Thorough understanding of marketing and negotiating techniques.</li>
							<li>Fast learner and passion for sales.</li>
							<li>Self-motivated with a results-driven approach.</li>
							<li>Aptitude in delivering attractive presentations.</li>
							<li>High school degree.</li>
							<li>Proficiency in use of Facebook, Whatsapp.</li>
							<li>Work experience in Education sector is preferable.</li></ul>

							<form id="form10" enctype="multipart/form-data" method="POST" action="">
								<div class="col-md-12">
									<!-- <div class="form-group"> -->
										<input type="hidden" name="formValue" value="Marketing Executive for Sikkhim"/>

										<label>Name<span style="color:red">*</span> <input type="text" name="sender_name" class="form-control" required data-validation-required-message="Please enter your name." /> </label>
										<!-- <p class="help-block text-danger"></p> -->
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label>Email<span style="color:red">*</span> <input type="email" name="sender_email" class="form-control" required data-validation-required-message="Please enter your email address." /> </label><br>
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label>Mobile<span style="color:red">*</span> <input name="number" type="number" class="form-control" oninput="maxLengthCheck(this)" min = "1111111111"
max = "9999999999" required data-validation-required-message="Please enter your phone number."/></label>
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label class="control-label">Resume<span style="color:red">*</span><span style="font-size: 13px; font-weight: 300;"> (pdf, doc, docx - Under 2MB)</span> <input onchange="return ValidateSize(this)" id="resume" type="file" accept=".pdf, .doc, .docx" name="my_file" /></label><br>
									<!-- </div> -->
									<label><input type="submit" class="btn btn-success" name="button" value="Submit" /></label><br>
								</div>
							</form>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		<h4>Uttar Pradesh</h4>

		<table class="table">
			<thead>
				<tr>
					<th>Role</th>
					<th>Functional Area</th>
					<th>Experience</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Marketing Executive</td>
					<td>Marketing</td>
					<td>2-5 Years</td>
					<td>
						<a data-toggle="collapse" data-target="#demo11">
							<b><span>+</span> View Details</b>
						</a>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<div id="demo11" class="collapse">
							<b>Job Description:</b><br><br>

							Trakkerz sells mobile apps to Schools and Companies.<br>

							We are looking for a competitive and trustworthy Sales Executive/Manager to help us build up our business activities. You will be responsible for discovering and pursuing new sales prospects and maintaining customer satisfaction.<br>

							The goal is to meet and surpass the company’s expectations to drive rapid and sustainable growth.<br><br>

							<b>Responsibilities:</b><br><br>

							<ul>
								<li>Conduct market research to identify selling possibilities and evaluate customer needs.</li>
							<li>Actively seek out new sales opportunities through cold calling, networking, and social media.</li>
							<li>Set up meetings with potential clients and listen to their wishes and concerns.</li>
							<li>Prepare and deliver appropriate presentations on products/ services.</li>
							<li>Create frequent reviews and reports with sales and financial data.</li>
							<li>Participate on behalf of the company in exhibitions or conferences.</li>
							<li>Negotiate/close deals and handle complaints or objections.</li>
							<li>Collaborate with team to achieve better results.</li></ul>

							<b>Requirements:</b><br><br>

							<ul><li>Proven experience as a sales executive or relevant role.</li>
							<li>Proficiency in English.</li>
							<li>Working knowledge of MS Office.</li>
							<li>Thorough understanding of marketing and negotiating techniques.</li>
							<li>Fast learner and passion for sales.</li>
							<li>Self-motivated with a results-driven approach.</li>
							<li>Aptitude in delivering attractive presentations.</li>
							<li>High school degree.</li>
							<li>Proficiency in use of Facebook, Whatsapp.</li>
							<li>Work experience in Education sector is preferable.</li></ul>

							<form id="form11" enctype="multipart/form-data" method="POST" action="">
								<div class="col-md-12">
									<!-- <div class="form-group"> -->
										<input type="hidden" name="formValue" value="Marketing Executive for Uttar Pradesh"/>

										<label>Name<span style="color:red">*</span> <input type="text" name="sender_name" class="form-control" required data-validation-required-message="Please enter your name." /> </label>
										<!-- <p class="help-block text-danger"></p> -->
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label>Email<span style="color:red">*</span> <input type="email" name="sender_email" class="form-control" required data-validation-required-message="Please enter your email address." /> </label><br>
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label>Mobile<span style="color:red">*</span> <input name="number" type="number" class="form-control" oninput="maxLengthCheck(this)" min = "1111111111"
max = "9999999999" required data-validation-required-message="Please enter your phone number."/></label>
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label class="control-label">Resume<span style="color:red">*</span><span style="font-size: 13px; font-weight: 300;"> (pdf, doc, docx - Under 2MB)</span> <input onchange="return ValidateSize(this)" id="resume" type="file" accept=".pdf, .doc, .docx" name="my_file" /></label><br>
									<!-- </div> -->
									<label><input type="submit" class="btn btn-success" name="button" value="Submit" /></label><br>
								</div>
							</form>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		<h4>Uttarakhand</h4>

		<table class="table">
			<thead>
				<tr>
					<th>Role</th>
					<th>Functional Area</th>
					<th>Experience</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Marketing Executive</td>
					<td>Marketing</td>
					<td>2-5 Years</td>
					<td>
						<a data-toggle="collapse" data-target="#demo12">
							<b><span>+</span> View Details</b>
						</a>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<div id="demo12" class="collapse">
							<b>Job Description:</b><br><br>

							Trakkerz sells mobile apps to Schools and Companies.<br>

							We are looking for a competitive and trustworthy Sales Executive/Manager to help us build up our business activities. You will be responsible for discovering and pursuing new sales prospects and maintaining customer satisfaction.<br>

							The goal is to meet and surpass the company’s expectations to drive rapid and sustainable growth.<br><br>

							<b>Responsibilities:</b><br><br>

							<ul>
								<li>Conduct market research to identify selling possibilities and evaluate customer needs.</li>
							<li>Actively seek out new sales opportunities through cold calling, networking, and social media.</li>
							<li>Set up meetings with potential clients and listen to their wishes and concerns.</li>
							<li>Prepare and deliver appropriate presentations on products/ services.</li>
							<li>Create frequent reviews and reports with sales and financial data.</li>
							<li>Participate on behalf of the company in exhibitions or conferences.</li>
							<li>Negotiate/close deals and handle complaints or objections.</li>
							<li>Collaborate with team to achieve better results.</li></ul>

							<b>Requirements:</b><br><br>

							<ul><li>Proven experience as a sales executive or relevant role.</li>
							<li>Proficiency in English.</li>
							<li>Working knowledge of MS Office.</li>
							<li>Thorough understanding of marketing and negotiating techniques.</li>
							<li>Fast learner and passion for sales.</li>
							<li>Self-motivated with a results-driven approach.</li>
							<li>Aptitude in delivering attractive presentations.</li>
							<li>High school degree.</li>
							<li>Proficiency in use of Facebook, Whatsapp.</li>
							<li>Work experience in Education sector is preferable.</li></ul>

							<form id="form12" enctype="multipart/form-data" method="POST" action="">
								<div class="col-md-12">
									<!-- <div class="form-group"> -->
										<input type="hidden" name="formValue" value="Marketing Executive for Uttarakhand"/>

										<label>Name<span style="color:red">*</span> <input type="text" name="sender_name" class="form-control" required data-validation-required-message="Please enter your name." /> </label>
										<!-- <p class="help-block text-danger"></p> -->
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label>Email<span style="color:red">*</span> <input type="email" name="sender_email" class="form-control" required data-validation-required-message="Please enter your email address." /> </label><br>
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label>Mobile<span style="color:red">*</span> <input name="number" type="number" class="form-control" oninput="maxLengthCheck(this)" min = "1111111111"
max = "9999999999" required data-validation-required-message="Please enter your phone number."/></label>
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label class="control-label">Resume<span style="color:red">*</span><span style="font-size: 13px; font-weight: 300;"> (pdf, doc, docx - Under 2MB)</span> <input onchange="return ValidateSize(this)" id="resume" type="file" accept=".pdf, .doc, .docx" name="my_file" /></label><br>
									<!-- </div> -->
									<label><input type="submit" class="btn btn-success" name="button" value="Submit" /></label><br>
								</div>
							</form>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		<h4>West Bengal</h4>

		<table class="table">
			<thead>
				<tr>
					<th>Role</th>
					<th>Functional Area</th>
					<th>Experience</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Marketing Executive</td>
					<td>Marketing</td>
					<td>2-5 Years</td>
					<td>
						<a data-toggle="collapse" data-target="#demo13">
							<b><span>+</span> View Details</b>
						</a>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<div id="demo13" class="collapse">
							<b>Job Description:</b><br><br>

							Trakkerz sells mobile apps to Schools and Companies.<br>

							We are looking for a competitive and trustworthy Sales Executive/Manager to help us build up our business activities. You will be responsible for discovering and pursuing new sales prospects and maintaining customer satisfaction.<br>

							The goal is to meet and surpass the company’s expectations to drive rapid and sustainable growth.<br><br>

							<b>Responsibilities:</b><br><br>

							<ul>
								<li>Conduct market research to identify selling possibilities and evaluate customer needs.</li>
							<li>Actively seek out new sales opportunities through cold calling, networking, and social media.</li>
							<li>Set up meetings with potential clients and listen to their wishes and concerns.</li>
							<li>Prepare and deliver appropriate presentations on products/ services.</li>
							<li>Create frequent reviews and reports with sales and financial data.</li>
							<li>Participate on behalf of the company in exhibitions or conferences.</li>
							<li>Negotiate/close deals and handle complaints or objections.</li>
							<li>Collaborate with team to achieve better results.</li></ul>

							<b>Requirements:</b><br><br>

							<ul><li>Proven experience as a sales executive or relevant role.</li>
							<li>Proficiency in English.</li>
							<li>Working knowledge of MS Office.</li>
							<li>Thorough understanding of marketing and negotiating techniques.</li>
							<li>Fast learner and passion for sales.</li>
							<li>Self-motivated with a results-driven approach.</li>
							<li>Aptitude in delivering attractive presentations.</li>
							<li>High school degree.</li>
							<li>Proficiency in use of Facebook, Whatsapp.</li>
							<li>Work experience in Education sector is preferable.</li></ul>

							<form id="form13" enctype="multipart/form-data" method="POST" action="">
								<div class="col-md-12">
									<!-- <div class="form-group"> -->
										<input type="hidden" name="formValue" value="Marketing Executive for West Bengal"/>

										<label>Name<span style="color:red">*</span> <input type="text" name="sender_name" class="form-control" required data-validation-required-message="Please enter your name." /> </label>
										<!-- <p class="help-block text-danger"></p> -->
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label>Email<span style="color:red">*</span> <input type="email" name="sender_email" class="form-control" required data-validation-required-message="Please enter your email address." /> </label><br>
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label>Mobile<span style="color:red">*</span> <input name="number" type="number" class="form-control" oninput="maxLengthCheck(this)" min = "1111111111"
max = "9999999999" required data-validation-required-message="Please enter your phone number."/></label>
									<!-- </div> -->
									<!-- <div class="form-group"> -->
										<label class="control-label">Resume<span style="color:red">*</span><span style="font-size: 13px; font-weight: 300;"> (pdf, doc, docx - Under 2MB)</span> <input onchange="return ValidateSize(this)" id="resume" type="file" accept=".pdf, .doc, .docx" name="my_file" /></label><br>
									<!-- </div> -->
									<label><input type="submit" class="btn btn-success" name="button" value="Submit" /></label><br>
								</div>
							</form>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>


<footer class="footer">
  <div class="container text-center">
	<a href="https://www.facebook.com/trakkerz" target="_blank"><i class="fa fa-facebook"></i></a>
	<!-- <a href="#"><i class="fa fa-twitter"></i></a> -->
	<a href="https://in.linkedin.com/company/trakkerz" target="_blank"><i class="fa fa-linkedin"></i></a>
	<a href="https://plus.google.com/100236781306734345004" target="_blank"><i class="fa fa-google-plus"></i></a>
	<!-- <a href="#"><i class="fa fa-skype"></i></a> -->
  </div>
</footer><br><br>

</body>

<script type="text/javascript">
	function getExtension(filename)
	{
		//console.log("filename is: "+filename);
    	var parts = filename.split(".");
    	//console.log("Parts is: "+parts);
    	return parts[parts.length - 1];
	}
	function ValidateSize(file)
	{
		var fileDetails = file.files[0];
		var FileSize = fileDetails.size / 1024 / 1024; // in MB
		//console.log("File size is: "+FileSize);
        if (FileSize > 2)
        {
            alert('File size exceeds 2 MB');
            // document.getElementById("resume").value = "";
            location.reload();
			return false;
        }
         
		//console.log("file is: "+filename);
        var ext = getExtension(fileDetails.name);
        //console.log("extension is: "+ ext);
        if(ext.toLowerCase() == 'pdf' || ext.toLowerCase() == 'doc' || ext.toLowerCase() == 'docx')
        {
        	return true;
        }
        else
        {
        	alert("File extension is not acceptable");
        	// document.getElementById("resume").value="";
        	location.reload();
        	return false;
        }
    }

    function maxLengthCheck(object)
	{
		if (object.value.length > object.max.length)
		object.value = object.value.slice(0, object.max.length)
	}
</script>
</html>