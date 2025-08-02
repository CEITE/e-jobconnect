<?php
session_start();
require 'vendor/autoload.php';
include'connect/connect.php';

	if(isset($_SESSION['id'])){
		$type=$_SESSION['type'];
		header("location: ../".$type."/");
	}


	if (isset($_POST['submit'])) {
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$pass = md5($_POST['password']);
		$role = $_POST['user_type'];

		try {
		// Check if the email is already exist
			$sql = "SELECT * FROM admin WHERE email='$email' LIMIT 1";
			$result = $conn->query($sql);

			$type = null;

			if ($result->num_rows > 0) {
				$type="admin";
			}


			$sql = "SELECT * FROM employer WHERE email='$email' LIMIT 1";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				$type="employer";
			}


			$sql = "SELECT * FROM applicant WHERE email='$email' LIMIT 1";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				$type="applicant";
			}

			if ($type != null) {
				$sql = "SELECT * FROM $type WHERE email='$email' LIMIT 1";
				$result = $conn->query($sql);
			}
		// End of Function

			if ($type != null) {
				if ($result->num_rows > 0) {
					echo "Account already exists";
				}
			} 
			else {
				$sql = "INSERT INTO $role (firstname, lastname, email, password, type, status) 
				        VALUES ('$fname', '$lname', '$email', '$pass', '$role', 'pending')";
				$conn->query($sql);

				echo "Welcome, $fname $lname!";



				// Email starts here
				$mail = new PHPMailer\PHPMailer\PHPMailer();

				try {
					$token = bin2hex(random_bytes(16));
					$expiry = date("Y-m-d H:i:s", strtotime("+1 hour"));
					$conn->query("UPDATE $role SET reset_token='$token', token_expiry='$expiry' WHERE email='$email'");

				    $link_verification = "https://e-jobconnect.ceitesystems.com/index.php?token=$token&type=$role";

				    $mail->isSMTP();
				    $mail->Host = 'smtp.gmail.com';
				    $mail->SMTPAuth = true;
				    $mail->Username = 'martylex7@gmail.com';
				    $mail->Password = 'zvbx sict ephh ooxp';
				    $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
				    $mail->Port = 587;

				    $mail->setFrom($email, 'Sta. Rosa | E-JobConnect');
				    $mail->addAddress($email, 'Recipient Name');

				    $mail->isHTML(true);
				    $mail->Subject = 'Verify Your Account - Sta. Rosa | E-JobConnect';
				    $mail->Body    = "Dear $fname $lname,<br>
				            <br>
				            Thank you for registering with us.<br>
				            <br>
				            To complete your registration and activate your account. Please verify your email by clicking the link below:
				            <br>
				            <p><a href='$link_verification'>Verify your account</a></p><br>
				            <br>
				            The link will expire in one hour.<br>
				            <br>
				            If you did not create this account, you can safely ignore this message.<br>
				            <br>
				            Thank you for being a part of Sta. Rosa | E-JobConnect — where we connect you to job opportunities in and around Santa Rosa, Laguna.<br>";

				    if ($mail->send()) {
				        echo 'Message has been sent';
				    } else {
				        echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
				    }
				} catch (Exception $e) {
				    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
				}
				// Email ends here



			}
		}
		catch (Exception $e) {
			echo "Something went wrong! $e";
		}



	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
<base href="" />
		<title>Signup-Ejobconnect</title>
		<meta charset="utf-8" />
		<meta name="description" content="Sta. Rosa e-JobConnect aims to provide a centralized, accessible, and user-friendly web platform that bridges jobseekers and employers through efficient, transparent, and technology-driven recruitment and employment services. By streamlining job matching, promoting local opportunities, and enhancing communication between stakeholders, the platform empowers the workforce and supports inclusive economic growth within the City of Sta. Rosa." />
		<meta name="keywords" content="job, seeker, hunting, looking for" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Sta.rosa Laguna Job Hunting" />
		<meta property="og:url" content="https://e-jobconnect.ceitesystems.com/" />
		<meta property="og:site_name" content="Sta.Rosa e-JobConnect" />
		<link rel="shortcut icon" href="assets/images/seal-of-santa-rosa-laguna-2.png" type="image/x-icon">
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="app-blank">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Body-->
				<div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
					<!--begin::Form-->
					<div class="d-flex flex-center flex-column flex-lg-row-fluid">
						<!--begin::Wrapper-->
						<div class="w-lg-500px p-10">
							<!--begin::Form-->
							<form class="form w-100" id="kt_sign_in_form" data-kt-redirect-url="index.html" action="" method="POST">
							<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="index.php" action="#">
								<!--begin::Heading-->
								<div class="text-center mb-11">
									<!--begin::Title-->
									<h1 class="text-gray-900 fw-bolder mb-3">Sign up</h1>
									<!--end::Title-->
								</div>
								<!--begin::Heading-->
								<!--begin::Separator-->
								<div class="separator separator-content my-14">
									<span class="w-125px text-gray-500 fw-semibold fs-7">Credentials</span>
								</div>
								<!--end::Separator-->
								<?php
									if(isset($_GET['error'])){
										$error=$_GET['error'];
										?>
										<div class="alert alert-danger alert-dismissible">
										  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
										  <strong>Error!</strong> <?php echo$error?>
										</div>
										<?php
									}
								?>
								<!--begin::Input group=-->
								<!--end::Separator-->
								<!--begin::Input group=-->
								<div class="fv-row mb-8">
									<!--begin::Email-->
									<select  placeholder="Email" name="user_type" autocomplete="off" class="form-control bg-transparent" >
										<option></option>
										<option value="employer">Employer</option>
										<option value="applicant">Applicant</option>
									</select>
									<!--end::Email-->
								</div>
								<!--begin::Input group=-->
								<div class="fv-row mb-8">
									<!--begin::Email-->
									<input type="text" placeholder="First Name" name="fname" autocomplete="off" class="form-control bg-transparent" />
									<!--end::Email-->
								</div>
								<!--begin::Input group=-->
								<div class="fv-row mb-8">
									<!--begin::Email-->
									<input type="text" placeholder="Last Name" name="lname" autocomplete="off" class="form-control bg-transparent" />
									<!--end::Email-->
								</div>
								<!--begin::Input group=-->
								<div class="fv-row mb-8">
									<!--begin::Email-->
									<input type="email" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" />
									<!--end::Email-->
								</div>
								<!--begin::Input group-->
								<div class="fv-row mb-8" data-kt-password-meter="true">
									<!--begin::Wrapper-->
									<div class="mb-1">
										<!--begin::Input wrapper-->
										<div class="position-relative mb-3">
											<input class="form-control bg-transparent" type="password" placeholder="Password" name="password" autocomplete="off" />
											<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
												<!-- <i class="ki-duotone ki-eye-slash fs-2"></i>
												<i class="ki-duotone ki-eye fs-2 d-none"></i> --> 
												<i class="bi bi-eye-slash fs-2"></i>
												<i class="bi bi-eye fs-2 d-none"></i>
											</span>
										</div>
										
										<!--end::Input wrapper-->
										<!--begin::Meter-->
										<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
										</div>
										<!--end::Meter-->
									</div>
									<!--end::Wrapper-->
									<!--begin::Hint-->
									<div class="text-muted">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
									<!--end::Hint-->
								</div>
								<!--end::Input group=-->
								<!--begin::Wrapper-->
								<div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
									<div></div>
									<!--begin::Link-->
									<a href="forgot-password.php" class="link-danger">Forgot Password ?</a>
									<!--end::Link-->
								</div>
								<!--begin::Submit button-->
								<div class="d-grid mb-10">
									<button type="submit" name="submit" id="kt_sign_in_submit" class="btn btn-danger">
										<!--begin::Indicator label-->
										<span class="indicator-label">Create Account</span>
										<!--end::Indicator label-->
										<!--begin::Indicator progress-->
										<span class="indicator-progress">Please wait... 
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
										<!--end::Indicator progress-->
									</button>
								</div>
								<!--end::Submit button-->
								<!--begin::Sign up-->
								<div class="text-gray-500 text-center fw-semibold fs-6">Already a Member ? 
								<a href="login.php" class="link-danger">Log In here</a></div>
								<!--end::Sign up-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Form-->
				</div>
				<!--end::Body-->
				<!--begin::Aside-->
				<div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="background:#ffd7ef;">
					<!--begin::Content-->
					<div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
						<!--begin::Logo-->
						<a href="index.php" class="mb-0 mb-lg-12">
							<img alt="Logo" src="assets/images/seal-of-santa-rosa-laguna-2.png" type="image/x-icon" class="h-60px h-lg-100px" />
						</a>
						<!--end::Logo-->
						<!--begin::Image-->
						<img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-300px mb-10 mb-lg-20" src="assets/images/1200px-ph-fil-santa-rosa-laguna.png" alt="" />
						<!--end::Image-->
						<!--begin::Title-->
						<h1 class="d-none d-lg-block text-dark fs-2qx fw-bolder text-center mb-7">Sta.rosa E-JobConnect</h1>
						<!--end::Title-->
						<!--begin::Text-->
						<div class="d-none d-lg-block text-dark fs-base text-center">Santa Rosa, Laguna is a <a href="#" class="opacity-75-hover text-danger fw-bold me-1">vibrant city</a> known for its <a href="#" class="opacity-75-hover text-danger fw-bold me-1">rapid development, diverse economy,</a><br> and status as a key transportation hub.
						<!--end::Text-->
					</div>
					<!--end::Content-->
				</div>
				<!--end::Aside-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Root-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="assets/js/custom/authentication/sign-up/general.js"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>