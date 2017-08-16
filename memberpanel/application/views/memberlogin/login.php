 <!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
<title>Mantra - Member Login</title>
<link href="<?php echo base_url(); ?>application/assets/css/bootstrap.css" rel="stylesheet">
<!--<link href="<?php echo base_url(); ?>application/assets/css/bootstrap.min.css" rel="stylesheet">-->
<link href="<?php echo base_url(); ?>application/assets/css/login.css" rel="stylesheet" type="text/css"  />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>application/assets/js/login/login.js"></script>

</head>
<body>
<!--
   <div class="imgcontainer">
    <img src="<?php echo base_url(); ?>application/assets/images/icon256.png" alt="Avatar" class="avatar">
  </div>

<div class="container">
 <input type="hidden" value="<?php echo base_url(); ?>" id="basepath"></input>

 <div class="alert alert-danger" role="alert" style="display:none;" id="msgdiv">
     <div id="msgText"></div>
     <span class="glyphicon glyphicon-remove" aria-hidden="true" style="float: right;margin-top: -19px;cursor: pointer;"></span>
 </div>
 
 
 <label><b>Mobile</b></label>
    <input type="text" placeholder="Enter mobile" class="form-control" name="member" id="member" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" class="form-control" name="pwd" id="pwd" required>

    <button type="submit" id="memeberlogin">Login</button>
    <input type="checkbox" checked="checked"> Remember me
	
</div>

  <div class="container" style="background-color:#f1f1f1">
    
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
--> 

<div class="container-fluid">
	<div class="row custom-login-row">
	<div class="col-md-6 login-text-box">
		<div class="login-icon">
			<img src="<?php echo base_url(); ?>application/assets/images/mantra-logo.png" />
		</div>
		
		<div class="mantra-title-box">
			<h1 class="mantra-title">MANTRA</h1>
			<p class="mantra-catchline">LIFE STYLE HEALTH CLUB</p>
		</div>
		
		<div class="login-text">
			
		</div>
	</div>
	<div class="col-md-6 login-form-container">
		
		<input type="hidden" value="<?php echo base_url(); ?>" id="basepath"></input>
		<div class="alert alert-danger error" role="alert" style="display:none;" id="msgdiv">
			<div id="msgText"></div>
			<span class="glyphicon glyphicon-remove" aria-hidden="true" style="float: right;margin-top: -19px;cursor: pointer;"></span>
		</div>
		
		<label><b>Mobile</b></label>
		<input type="text" placeholder="9136875942" class="form-control custom-input" name="member" id="member" required>

		<label><b>Password</b></label>
		<input type="password" placeholder="Enter your password" class="form-control custom-input" name="pwd" id="pwd" required>
                <p class="help-block">Your default password is your date of birth (e.g.1990-12-31).</p>

		<button type="submit" id="memeberlogin" class="custom-button memeberlogin">Login</button>
		<!--<input type="checkbox" checked="checked" ><span class="remeber-me"> Remember me</span>-->
		 <span class="psw"><a href="#"> Forgot password?</a></span>
		 
		 
		 <div class="verifying-account" style="width:100%;clear:both;display:none;">
			<img src="<?php echo base_url();?>application/assets/images/reload.gif" style="margin-left:auto;margin-right:auto;display:block;"/>
			<p style="text-align:center;color:#F66434;letter-spacing:1px;">Verifying your account.Please wait...</p>
		 </div>
	</div>
		
	</div>
</div>




</body>
</html>