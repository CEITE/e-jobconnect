<?php
session_start();
include'connect/connect.php';

	if(isset($_SESSION['id'])){
		$type=$_SESSION['type'];
		header("location: ../".$type."/");
	}

	if (isset($_POST['submit'])) {
			$token = $_GET['token'];
			$type = $_GET['type'];
			$newPassword = $_POST['password'];

			$result = $conn->query("SELECT * FROM $type WHERE reset_token='$token' AND token_expiry > NOW()");
			
			if ($result->num_rows > 0) {
				$user = $result->fetch_assoc();
				
				$hashedPassword = md5($newPassword);
				$conn->query("UPDATE $type SET password='$hashedPassword', reset_token=NULL, token_expiry=NULL WHERE id='{$user['id']}'");

				echo "Password has been reset successfully.";
			} else {
				echo "Invalid or expired token.";
			}
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
<base href="" />
		<title>Forgot Password Verification</title>
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
							<form method="POST" class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" id="kt_password_reset_form" data-kt-redirect-url="authentication/layouts/corporate/new-password.html" action="#">
								<!--begin::Heading-->
								<div class="text-center mb-10">
									<!--begin::Title-->
									<h1 class="text-gray-900 fw-bolder mb-3">Forgot Password ?</h1>
									<!--end::Title-->
									<!--begin::Link-->
									<div class="text-gray-500 fw-semibold fs-6">Enter your email to reset your password.</div>
									<!--end::Link-->
								</div>
								<!--begin::Heading-->
								<!--begin::Input group=-->
								<div class="fv-row mb-8 fv-plugins-icon-container">
									<!--begin::Email-->
									<input type="password" placeholder="Enter new password" name="password" autocomplete="off" class="form-control bg-transparent">
									<!--end::Email-->
								<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
								<!--begin::Actions-->
								<div class="d-flex flex-wrap justify-content-center pb-lg-0">
									<button type="submit" id="kt_password_reset_submit" name="submit" class="btn btn-danger me-4">
										<!--begin::Indicator label-->
										<span class="indicator-label">Submit</span>
										<!--end::Indicator label-->
										<!--begin::Indicator progress-->
										<span class="indicator-progress">Please wait... 
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
										<!--end::Indicator progress-->
									</button>
									<a href="authentication/layouts/corporate/sign-in.html" class="btn btn-light">Cancel</a>
								</div>
								<!--end::Actions-->
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
						<a href="index.html" class="mb-0 mb-lg-12">
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
		<script src="assets/js/custom/authentication/sign-in/general.js"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>