<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<title>Postmedia - Share Your Epic Moment</title>
	<link rel="icon" href="https://www.postmedia.com/wp-content/uploads/2015/03/Postmedia-Network-Slide-logo.jpg" type="image/png" sizes="16x16">


	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/color.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css">
    <link href="<?php echo base_url();?>/assets/css/dropify/dropify.min.css" rel="stylesheet">

</head>

<body>
	<!--<div class="se-pre-con"></div>-->
	<div class="theme-layout">
		<div class="container-fluid pdng0">
			<div class="row merged">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="land-featurearea">
						<div class="land-meta">

							<div class="friend-logo">
								<span><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/Postmedia_Logo_01.2020.svg/1200px-Postmedia_Logo_01.2020.svg.png" style="max-width: 60%;" alt=""></span>
							</div>
							<p>
								Share your epic moment in your live.
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

					<div class="login-reg-bg">
						<div class="log-reg-area sign">
							<h2 class="log-title">Login</h2>
							<p>
								Login and greet back followers.
							</p>
							<!--ALERT-->
							<?php if ($this->session->flashdata('alert')) {
								$dataalert = explode("|", $this->session->flashdata('alert'));
								$status = $dataalert[0];
								$message = $dataalert[1];
							?>
								<div class="alert alert-<?php echo $status; ?>">
									<?php echo $message; ?>
								</div>
							<?php } ?>

							<?php if ($this->session->flashdata('alert2')) {
								$dataalert = explode("|", $this->session->flashdata('alert2'));
								$status = $dataalert[0];
								$message = $dataalert[1];
							?>
								<div class="alert alert-<?php echo $status; ?>">
									<?php echo $message; ?>
								</div>
							<?php } ?>
							<!--END ALERT-->
							<form action="<?php echo base_url(); ?>account/login"  method="POST">
								<div class="form-group">
									<input type="email" name="email" id="input" required="required" />
									<label class="control-label" for="input">E-mail</label><i class="mtrl-select"></i>
								</div>
								<div class="form-group">
									<input type="password"  name="password" required="required" />
									<label class="control-label" for="input">Password</label><i class="mtrl-select"></i>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" checked="checked" /><i class="check-box"></i>Always Remember Me.
									</label>
								</div>
								<a href="#" title="" class="forgot-pwd">Forgot Password?</a>
								<div class="submit-btns">
									<button type="submit" class="btn signin" type="button"><span>Login</span></button>
									<button class="btn signup" type="button"><span>Register</span></button>
								</div>
							</form>
						</div>
						<div class="log-reg-area reg">
							<h2 class="log-title">Register</h2>
							<p>
								Join now to share your moment
							</p>
							<form action="<?php echo base_url(); ?>account/register" enctype="multipart/form-data" method="POST">
								<div class="form-group">
									<input type="text" name="full_name" required="required" />
									<label class="control-label" for="input">First & Last Name</label><i class="mtrl-select"></i>
								</div>
								<div class="form-group">
									<input type="text" name="username" required="required" />
									<label class="control-label" for="input">User Name</label><i class="mtrl-select"></i>
								</div>
								<div class="form-group">
									<input type="password" name="password" required="required" />
									<label class="control-label" for="input">Password</label><i class="mtrl-select"></i>
								</div>
								<div class="form-radio">
									<div class="radio">
										<label>
											<input type="radio" name="gender" checked="checked" /><i class="check-box"></i>Male
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="gender" /><i class="check-box"></i>Female
										</label>
									</div>
								</div>
								<div class="form-group">
									<input type="text" name="email" required="required" />
									<label class="control-label" for="input"><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="6c29010d05002c">[email&#160;protected]</a></label><i class="mtrl-select"></i>
								</div>
								<div class="form-group">
									<input type="file" name="files" required="required" />
									<label class="control-label" for="files">Photo Profile</label><i class="mtrl-select"></i>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" checked="checked" /><i class="check-box"></i>Accept Terms & Conditions ?
									</label>
								</div>
								<a href="#" title="" class="already-have">Already have an account</a>
								<button type="submit" class="btn btn-info"><span>Register Now</span></button>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="<?php echo base_url(); ?>assets/js/main.min.js"></script>
    <script src="<?php echo base_url();?>/assets/js/dropify/dropify.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/script.js"></script>

</body>

</html>