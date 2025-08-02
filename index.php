<?php
session_start();
include'connect/connect.php';

    if(isset($_SESSION['id'])){
        $type=$_SESSION['type'];
        header("location: ../".$type."/");
    }

    sleep(1);
    if (isset($_GET['token']) && isset($_GET['type'])) {
            $token = $_GET['token'];
            $type = $_GET['type'];

            $result = $conn->query("SELECT * FROM $type WHERE reset_token='$token' AND token_expiry > NOW()");
            
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();

                $conn->query("UPDATE $type SET status='approved', reset_token=NULL, token_expiry=NULL WHERE id='{$user['id']}'");

                echo "Your account is successfully verified.";
            } else {
                echo "Invalid or expired token.";
            }
    }
?>


<!DOCTYPE html>
<html  >
<head>
  <!-- Site made with  v6.0.5, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v6.0.5, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/seal-of-santa-rosa-laguna-2.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Home</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Inter+Tight:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter+Tight:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css?v=N5aXv8"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css?v=N5aXv8" type="text/css">

  
  
  
</head>
<body>
  
  <section data-bs-version="5.1" class="menu menu5 cid-uSlcbKVjXo" once="menu" id="menu05-0">
	

	<nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
		<div class="container">
			<div class="navbar-brand">
				<span class="navbar-logo">
					<a href="index.php#top">
						<img src="assets/images/seal-of-santa-rosa-laguna-2.png" alt="" style="height: 4.3rem;">
					</a>
				</span>
				<span class="navbar-caption-wrap"><a class="navbar-caption text-primary display-7" href="index.php#top">Sta.Rosa | E-JobConnect</a></span>
			</div>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<div class="hamburger">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				
				<div class="navbar-buttons mbr-section-btn"><a class="btn btn-secondary display-7" href="employer/">POST A JOB</a> <a class="btn btn-primary display-7" href="find_a_job.php">FIND JOB</a> <a class="btn btn-primary-outline display-7" href="login.php">Login | Signup</a></div>
			</div>
		</div>
	</nav>
</section>

<section data-bs-version="5.1" class="header8 cid-uSlev0n3OC mbr-fullscreen" id="header08-1">
	

	

	<div class="container">
		<div class="row content-wrapper justify-content-center">
			<div class="col-lg-7 mbr-form">
				<div class="text-wrapper align-left" data-form-type="formoid">
					<form  action="find_a_job.php" >
						<div class="dragArea row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<h1 class="mbr-section-title mbr-fonts-style mb-4 display-2"><strong style="font-size: 4rem;">The Job Hunting in Sta.rosa Laguna</strong></h1>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12">
								<p class="mbr-text mbr-fonts-style mb-4 display-7">
									Santa Rosa, Laguna is a vibrant city known for its rapid development, diverse economy, and status as a key transportation hub.</p>
							</div>
							<div data-for="email" class="col-lg-6 col-md-6 col-sm-12">
								<input type="" name="search" placeholder="Looking for something" data-form-field="email" class="form-control display-7" value="" id="email-header08-1">
							</div>
							<div class="col-auto mbr-section-btn"><button type="submit" class="w-100 btn btn-primary-outline display-7"><span class="mbri-search mbr-iconfont mbr-iconfont-btn"></span>Search</button></div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-lg-5 col-12">
				<div class="image-wrapper">
					<img class="w-100" src="assets/images/1200px-ph-fil-santa-rosa-laguna.png" alt="">
				</div>
			</div>
		</div>
	</div>
</section>

<section data-bs-version="5.1" class="contacts01 cid-uSlhtrmf10" id="contacts01-2">
    

    
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 content-head">
                <div class="mbr-section-head mb-5">
                    <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
                        <strong>Common Skills Looking for</strong></h3>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="item features-without-image col-12 col-md-4 active">
                <div class="item-wrapper">
                    <div class="text-wrapper">
                        <h6 class="card-title mbr-fonts-style mb-3 display-5">
                            <strong>Working Hours</strong>
                        </h6>
                        
                    </div>
                </div>
            </div><div class="item features-without-image col-12 col-md-4">
                <div class="item-wrapper">
                    <div class="text-wrapper">
                        <h6 class="card-title mbr-fonts-style mb-3 display-5"><strong>Automotive</strong></h6>
                        
                    </div>
                </div>
            </div>
            <div class="item features-without-image col-12 col-md-4">
                <div class="item-wrapper">
                    <div class="text-wrapper">
                        <h6 class="card-title mbr-fonts-style mb-3 display-5">
                            <strong>Production Operator</strong></h6>
                        
                    </div>
                </div>
            </div><div class="item features-without-image col-12 col-md-4">
                <div class="item-wrapper">
                    <div class="text-wrapper">
                        <h6 class="card-title mbr-fonts-style mb-3 display-5"><strong>Marketing</strong></h6>
                        
                    </div>
                </div>
            </div>
            <div class="item features-without-image col-12 col-md-4">
                <div class="item-wrapper">
                    <div class="text-wrapper">
                        <h6 class="card-title mbr-fonts-style mb-3 display-5"><strong>Graphic Designer</strong></h6>
                        
                    </div>
                </div>
            </div><div class="item features-without-image col-12 col-md-4">
                <div class="item-wrapper">
                    <div class="text-wrapper">
                        <h6 class="card-title mbr-fonts-style mb-3 display-5"><strong>Content Writer</strong></h6>
                        
                    </div>
                </div>
            </div><div class="item features-without-image col-12 col-md-4">
                <div class="item-wrapper">
                    <div class="text-wrapper">
                        <h6 class="card-title mbr-fonts-style mb-3 display-5"><strong>Social Media Marketer</strong></h6>
                        
                    </div>
                </div>
            </div><div class="item features-without-image col-12 col-md-4">
                <div class="item-wrapper">
                    <div class="text-wrapper">
                        <h6 class="card-title mbr-fonts-style mb-3 display-5"><strong>PHP Developer</strong></h6>
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="list07 cid-uSliD8aAKl" id="list07-3">
    
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="col-12 col-md-12">
                    <h5 class="mbr-section-title mbr-fonts-style mt-0 mb-4 display-2">
                        <strong>What Our Employers Say.</strong>
                    </h5>
                    <h6 class="mbr-section-subtitle mbr-fonts-style mt-0 mb-4 display-7">
                        With a spirit of innovation, we navigate uncharted territories, exploring new ideas,
                        technologies, and approaches.</h6>
                    
                </div>
            </div>

            <div class="col-lg-8">
                <div id="bootstrap-accordion_3" class="panel-group accordionStyles accordion" role="tablist" aria-multiselectable="true">
                    <div class="card">
                        <div class="card-header" role="tab" id="headingOne">
                            <a role="button" class="panel-title collapsed" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse1_3" aria-expanded="false" aria-controls="collapse1">
                                <h6 class="panel-title-edit mbr-semibold mbr-fonts-style mb-0 display-5">Helped me to...free up my life.</h6>
                                <span class="sign mbr-iconfont mobi-mbri-arrow-down"></span>
                            </a>
                        </div>
                        <div id="collapse1_3" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" data-bs-parent="#bootstrap-accordion_3">
                            <div class="panel-body">
                                <p class="mbr-fonts-style panel-text display-7">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum
                                    laoreet tincidunt. Proin et sapien scelerisque, ornare lectus eget, iaculis
                                    lectus. Pellentesque viverra molestie tortor. Nunc sed interdum est, in maximus
                                    diam. Donec eu tellus dictum, gravida velit et, sagittis arcu. Proin et lectus
                                    dapibus. Cras fringilla elit velit placerat tortor mollis cursus.
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="card">
                        <div class="card-header" role="tab" id="headingOne">
                            <a role="button" class="panel-title collapsed" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse2_3" aria-expanded="false" aria-controls="collapse2">
                                <h6 class="panel-title-edit mbr-semibold mbr-fonts-style mb-0 display-5">Found the most talented person i have ever worked with.</h6>
                                <span class="sign mbr-iconfont mobi-mbri-arrow-down"></span>
                            </a>
                        </div>
                        <div id="collapse2_3" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" data-bs-parent="#bootstrap-accordion_3">
                            <div class="panel-body">
                                <p class="mbr-fonts-style panel-text display-7">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum
                                    laoreet tincidunt. Proin et sapien scelerisque, ornare lectus eget, iaculis
                                    lectus. Pellentesque viverra molestie tortor. Nunc sed interdum est, in maximus
                                    diam. Donec eu tellus dictum, gravida velit et, sagittis arcu. Proin et lectus
                                    dapibus. Cras fringilla elit velit placerat tortor mollis cursus.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" role="tab" id="headingOne">
                            <a role="button" class="panel-title collapsed" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse3_3" aria-expanded="false" aria-controls="collapse3">
                                <h6 class="panel-title-edit mbr-semibold mbr-fonts-style mb-0 display-5">Extremely dedicated, honest, and loyal</h6>
                                <span class="sign mbr-iconfont mobi-mbri-arrow-down"></span>
                            </a>
                        </div>
                        <div id="collapse3_3" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" data-bs-parent="#bootstrap-accordion_3">
                            <div class="panel-body">
                                <p class="mbr-fonts-style panel-text display-7">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum
                                    laoreet tincidunt. Proin et sapien scelerisque, ornare lectus eget, iaculis
                                    lectus. Pellentesque viverra molestie tortor. Nunc sed interdum est, in maximus
                                    diam. Donec eu tellus dictum, gravida velit et, sagittis arcu. Proin et lectus
                                    dapibus. Cras fringilla elit velit placerat tortor mollis cursus.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" role="tab" id="headingOne">
                            <a role="button" class="panel-title collapsed" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse4_3" aria-expanded="false" aria-controls="collapse4">
                                <h6 class="panel-title-edit mbr-semibold mbr-fonts-style mb-0 display-5">Made managing my business easier.</h6>
                                <span class="sign mbr-iconfont mobi-mbri-arrow-down"></span>
                            </a>
                        </div>
                        <div id="collapse4_3" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" data-bs-parent="#bootstrap-accordion_3">
                            <div class="panel-body">
                                <p class="mbr-fonts-style panel-text display-7">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum
                                    laoreet tincidunt. Proin et sapien scelerisque, ornare lectus eget, iaculis
                                    lectus. Pellentesque viverra molestie tortor. Nunc sed interdum est, in maximus
                                    diam. Donec eu tellus dictum, gravida velit et, sagittis arcu. Proin et lectus
                                    dapibus. Cras fringilla elit velit placerat tortor mollis cursus.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="gallery07 cid-uSllKn8EJa" id="gallery07-6">
  
  
  <div class="container-fluid gallery-wrapper">
    <div class="row justify-content-center">
      <div class="col-12 content-head">
        
      </div>
    </div>
    <div class="grid-container">
      <div class="grid-container-3 moving-left" style="transform: translate3d(-200px, 0px, 0px);">
        <div class="grid-item">
          <img src="assets/images/robots-automobile-assembly-line-russia.webp" alt="">
        </div>
        <div class="grid-item">
          <img src="assets/images/production-worker-job-description-2455x3679.webp" alt="">
        </div>
        <div class="grid-item">
          <img src="assets/images/improving-teaching-styles.webp" alt="">
        </div>
        <div class="grid-item">
          <img src="assets/images/free-video-editing-software.jpg" alt="">
        </div>
      </div>
    </div>
  </div>
</section>

<section data-bs-version="5.1" class="footer1 cid-uSljM6jiKt" once="footers" id="footer01-4">
	

	
	
	<div class="container">
		<div class="row mbr-white">
			<div class="col-12 col-md-6 col-lg-3">
				<h5 class="mbr-section-subtitle mbr-fonts-style mb-2 display-5">
					<strong>Company</strong>
				</h5>
				<ul class="list mbr-fonts-style display-7">
					<li class="mbr-text item-wrap">About</li>
					<li class="mbr-text item-wrap">Press</li>
					<li class="mbr-text item-wrap">Careers</li>
					<li class="mbr-text item-wrap">Social</li>
					<li class="mbr-text item-wrap">Contact</li>
				</ul>
			</div>
			<div class="col-12 col-md-6 col-lg-3">
				<h5 class="mbr-section-subtitle mbr-fonts-style mb-2 display-5">
					<strong>Features</strong>
				</h5>
				<ul class="list mbr-fonts-style display-7">
					<li class="mbr-text item-wrap">Branding</li>
					<li class="mbr-text item-wrap">Promotion</li>
					<li class="mbr-text item-wrap">Design</li>
					<li class="mbr-text item-wrap">Creative</li>
					<li class="mbr-text item-wrap">Production</li>
				</ul>
			</div>
			<div class="col-12 col-md-6 col-lg-3">
				<h5 class="mbr-section-subtitle mbr-fonts-style mb-2 display-5">
					<strong>Support</strong>
				</h5>
				<ul class="list mbr-fonts-style display-7">
					<li class="mbr-text item-wrap">Help</li>
					<li class="mbr-text item-wrap">Info</li>
					<li class="mbr-text item-wrap">Contacts</li>
					<li class="mbr-text item-wrap">FAQ</li>
					<li class="mbr-text item-wrap">Report</li>
				</ul>
			</div>
			<div class="col-12 col-md-6 col-lg-3">
				<h5 class="mbr-section-subtitle mbr-fonts-style mb-2 display-5">
					<strong>About</strong>
				</h5>
				<ul class="list mbr-fonts-style display-7">
					<li class="mbr-text item-wrap">History</li>
					<li class="mbr-text item-wrap">Clients</li>
					<li class="mbr-text item-wrap">Teams</li>
					<li class="mbr-text item-wrap">Brand</li>
					<li class="mbr-text item-wrap">Terms</li>
				</ul>
			</div>
			<div class="col-12 mt-5 footer-col">
				<div class="mbr-section-btn align-left"><a class="btn btn-primary display-7" href="index.php">FIND JOBS</a>
					<a class="btn btn-secondary display-7" href="index.php">POST A JOB</a></div>

				<div class="social-row mt-2 display-7">
					<div class="soc-item">
						<a href="index.php">
							<span class="mbr-iconfont socicon-facebook socicon"></span>
						</a>
					</div>
					<div class="soc-item">
						<a href="index.php">
							<span class="mbr-iconfont socicon-twitter socicon"></span>
						</a>
					</div>
					<div class="soc-item">
						<a href="index.php">
							<span class="mbr-iconfont socicon-instagram socicon"></span>
						</a>
					</div>
					<div class="soc-item">
						<a href="index.php">
							<span class="mbr-iconfont socicon-logmein socicon"></span>
						</a>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</section><section class="display-7" style="padding: 0;align-items: center;justify-content: center;flex-wrap: wrap;    align-content: center;display: flex;position: absolute;height: 4rem;margin-left:-300px;margin-top: -65px;"><a href="https://mobiri.se/29566" style="flex: 1 1;height: 4rem;position: absolute;width: 100%;z-index: 1;"><img alt="" style="height: 4rem;" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="></a><p style="margin: 0;text-align: center;" class="display-7">&#8204;</p><a style="z-index:1" href="https://mobirise.com/builder/ai-website-generator.php">AI Website Generator</a></section><script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>  <script src="assets/smoothscroll/smooth-scroll.js"></script>  <script src="assets/ytplayer/index.js"></script>  <script src="assets/dropdown/js/navbar-dropdown.js"></script>  <script src="assets/scrollgallery/scroll-gallery.js"></script>  <script src="assets/theme/js/script.js"></script>  <script src="assets/formoid/formoid.min.js"></script>  
  
  
</body>
</html>