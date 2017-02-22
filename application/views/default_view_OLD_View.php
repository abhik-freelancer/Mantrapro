<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Mantra health zone">
    <meta name="author" content="">

    <title>Mantra</title>

    <!-- Custom css -->
    <link rel="stylesheet" href="<?php echo base_url();?>application/assets/css/style.css" />
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>application/assets/css/bootstrap.css" rel="stylesheet">
    <!-- Custom CSS Slider-->
   <!-- <link href="<?php echo base_url(); ?>application/assets/css/modern-business.css" rel="stylesheet">-->
    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>application/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<link href="<?php echo base_url(); ?>application/assets/css/animate.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>application/assets/css/pushy.css" rel="stylesheet">
	
<!--	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style>
        .container-fluid{
            padding-right:0%;
            padding-left:0%;
          //  position: relative;
        }
	
	
	</style>

</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
     
    
    <div class="container-fluid page-width">
    
     <!-- Top Fixed Header -->
    <div class="container-fluid top-header" >
        <div class="row">
             <div class="col-md-12"> 
				<img src="<?php echo base_url(); ?>application/assets/images/mantra-top-header2.jpg" height="119" />
				 <input type="hidden" value="<?php echo base_url(); ?>" id="basepath"></input> 
			 </div>
        </div>
    </div> 
	
	
	
	
	
	<!-- Navigation --
    <nav class="navbar navbar-default custom-nav" data-spy="affix" data-offset-top="147" id="navbar-main">
       <div class="container">
			<div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>home">
				<!--<img src="<?php echo base_url(); ?>application/assets/images/logo.jpg" id="logo"/>--
				
				</a>
            </div>
            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
					<li><a href="javascript:void(0);">Home</a></li>
                     <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">About <b class="caret"></b></a>
						 <ul class="dropdown-menu">
                            <li><a href="javascript:void(0)">About Us</a></li>
                            <li><a href="javascript:void(0)">Mission & Vision</a></li>
                            <li><a href="javascript:void(0)">Team Mantra</a></li>
                            <li><a href="javascript:void(0)">1st Life Style Health Club</a></li>
                            <li><a href="javascript:void(0)">Testimonials</a></li>
                            <li><a href="javascript:void(0)">Career</a></li>
                        </ul>
					</li>
                    <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Services <b class="caret"></b></a>
						 <ul class="dropdown-menu">
                            <li><a href="javascript:void(0)">Packages Offered</a></li>
                            <li><a href="javascript:void(0)">Branch Wise Rate Chart</a></li>
                            <li><a href="javascript:void(0)">Branch Wise Classes & Consultancy Schedule</a></li>
                            <li><a href="javascript:void(0)">Body Calculator</a></li>
                        </ul>
					</li>
                    <li><a href="javascript:void(0);">Event</a></li>
                    <li><a href="javascript:void(0);">Fitness Education</a></li>
                    <li><a href="javascript:void(0);">Nutrition</a></li>
                    <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Gallery <b class="caret"></b></a>
						 <ul class="dropdown-menu">
                            <li><a href="javascript:void(0)">Photo Gallery</a></li>
                            <li><a href="javascript:void(0)">Video Gallery</a></li>
                        </ul>
					</li>
                    <li><a href="javascript:void(0);">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav> -->
	
	<!-- Mega Menu -->
<section id="navbar-main">
<div class="container-fluid">
  <nav class="navbar navbar-default custom-nav" data-spy="affix" data-offset-top="117">

	<div class="navbar-header">
    <!--	<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button> 
		<span class="glyphicon glyphicon-menu-hamburger responsive-icon" onclick="openNav()"></span>-->
		<span class="glyphicon glyphicon-menu-hamburger responsive-icon menu-btn"></span>
	
		<!-- <a class="navbar-brand" href="#">My Store</a> -->
	</div>
	
	<div class="collapse navbar-collapse js-navbar-collapse" >
		<ul class="nav navbar-nav navbar-right desktop-view">
		<li><a href="<?php echo base_url();?>">Home</a></li>
		
<!-- Old About Us
<li class="dropdown mega-dropdown">
   <a href="#" class="dropdown-toggle" data-toggle="dropdown">About <span class="caret"></span></a>
   <ul class="dropdown-menu mega-dropdown-menu">
      <div class="container">
         <div class="row">
            <li class="col-sm-4">
               <ul>
                  <li class="dropdown-header">Shortly About Us</li>
                  <p>If you want to stay fit and healthy throughout your life, then forget all “magic and tantra” and simply believe in the purity of “Mantra”!</p>
                  <li><a href="javascript:void(0)" class="btn cutome-link-btn">View More</a></li>
               </ul>
            </li>
            <li class="col-sm-4">
               <ul>
                  <li class="dropdown-header">Mission & Vision</li>
                  <p>If you want to stay fit and healthy throughout your life, then forget all “magic and tantra” and simply believe in the purity of “Mantra”!</p>
                  <li><a href="javascript:void(0)" class="btn cutome-link-btn">View More</a></li>
               </ul>
            </li>
            <li class="col-sm-4">
               <ul>
                  <li class="dropdown-header">1st Life Style Health Club</li>
                  <p>If you want to stay fit and healthy throughout your life, then forget all “magic and tantra” and simply believe in the purity of “Mantra”!</p>
                  <li><a href="javascript:void(0)" class="btn cutome-link-btn">View More</a></li>
               </ul>
            </li>
         </div>
      </div>
      <div class="container">
         <div class="row">
            <li class="col-sm-4">
               <ul>
                  <li class="dropdown-header">Team Mantra</li>
                  <p>Mantra health club is promoted by extremely well known entities: Nu Mantra Life Style Health Club Private Limited by Mr. Subhbbrata Bhattacharjee and ,Mr. Dipanjan Bhattacharjee Who are all individually as passionate about healthy life style and fitness.</p>
                  <li><a href="javascript:void(0)" class="btn cutome-link-btn">View More</a></li>
               </ul>
            </li>
            <li class="col-sm-4">
               <ul>
                  <li class="dropdown-header">Testimonials</li>
                  <div class="nav-testimonial">
                     <div class='row'>
                        <div>
                           <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                           
                              <div class="carousel-inner">
                               
                                 <div class="item active">
                                    <div class="row">
                                       <div class="col-sm-4 text-center">
                                          <img src="<?php echo base_url(); ?>application/assets/images/testimonial1.jpg"  class="img-circle" style="width: 100px;height:100px;" >
                                       </div>
                                       <div class="col-sm-8">
                                          <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit!</p>
                                          <span style="font-style:itallic;">Someone famous</span>
                                       </div>
                                    </div>
                                 </div>
                                
                                 <div class="item">
                                    <div class="row">
                                       <div class="col-sm-4 text-center">
                                          <img src="<?php echo base_url(); ?>application/assets/images/testimonial2.jpg"  class="img-circle" style="width: 100px;height:100px;" >
                                       </div>
                                       <div class="col-sm-8">
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam auctor nec lacus ut tempor. Mauris.</p>
                                          <span style="font-style:itallic;">Someone famous</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           
                              <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                              <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
                 
                  <li><a href="javascript:void(0)" class="btn cutome-link-btn">View All</a></li>
               </ul>
            </li>
            <li class="col-sm-4">
               <ul>
                  <li class="dropdown-header">Career</li>
                  <p>If you want to stay fit and healthy throughout your life, then forget all “magic and tantra” and simply believe in the purity of “Mantra”!</p>
                  <li><a href="javascript:void(0)" class="btn cutome-link-btn">Apply Now</a></li>
               </ul>
            </li>
         </div>
      </div>
   </ul>
</li>
-->
		


<!-- Start -->
<li class="dropdown mega-dropdown">
   <a href="#" class="dropdown-toggle" data-toggle="dropdown">About <span class="caret"></span></a>
   <ul class="dropdown-menu mega-dropdown-menu">
      <li class="col-sm-4" style="border-right:1px solid #CCC;">
         <ul>
            <li class="dropdown-header">Shortly About Us</li>
            <p>If you want to stay fit and healthy throughout your life, then forget all “magic and tantra” and simply believe in the purity of “Mantra”!</p>
			<a href="<?php echo base_url();?>about/about_us" class="btn cutome-link-btn">View More</a>
			<li class="divider"></li>
			
			
            <li class="dropdown-header">Mission & Vision</li>
            <p>To make healthier INDIA by improving HEALTH ASSECT VALUE OF every Indian. </p>
            <a href="<?php echo base_url();?>about/mission_and_vision" class="btn cutome-link-btn">View More</a>
		    <li class="divider"></li>
			
			
            <li class="dropdown-header">1st Life Style Health Club</li>
            <p>MANTRA, the First Life Style Health Club of Kolkata, and the leading Health Club chain in North Kolkata, whose prime focus being on increasing this critical ‘wealth’, makes a resolution to spread “Health is the Greatest Wealth” awareness amongst the Mantra Members.
            </p>
            <a href="<?php echo base_url();?>about/life_style_health_club" class="btn cutome-link-btn">View More</a>
			
			
         </ul>
      </li>
      <li class="col-sm-4"  style="border-right:1px solid #CCC;">
         <ul>
            <li class="dropdown-header">Team Mantra</li>
            <div class="nav-mantra-director">
               <div class="mantra-direct-left">
                  <img src="<?php echo base_url(); ?>application/assets/images/subhabrata_bhattacharjee.jpg" class="">
                  <p>Mr. Subhabrata Bhattacharjee</p>
                  <p class="director">Director</p>
               </div>
               <div class="mantra-direct-right">
                  <img src="<?php echo base_url(); ?>application/assets/images/dipanjan_bhattacharjee.jpg">
                  <p>Mr. Dipanjan Bhattacharjee</p>
                  <p class="director">Director</p>
               </div>
            </div>
            <p class="team-mantra-desc">
               Mantra health club is promoted by extremely well known entities: Nu Mantra Life Style Health Club Private Limited by Mr. Subhbbrata Bhattacharjee and ,Mr. Dipanjan Bhattacharjee Who are all individually as passionate about healthy life style and fitness.They have a vision to make healthier INDIA by rendering high quality health and fitness service.
            </p>
             <a href="javascript:void(0)" class="btn cutome-link-btn">More About Team Mantra</a>
            
         </ul>
      </li>
      <li class="col-sm-4">
         <ul>
            <li class="dropdown-header">Testimonials</li>
            <div class="nav-testimonial">
               <div class='row'>
                  <div>
                     <div class="carousel slide" data-ride="carousel" id="quote-carousel">
						<div class="carousel-inner">
							<div class="item active">
                              <div class="row">
                                 <div class="col-sm-4 text-center">
                                    <img src="<?php echo base_url(); ?>application/assets/images/testimonial1.jpg"  class="img-circle" style="width: 100px;height:100px;" >
                                 </div>
                                 <div class="col-sm-8">
                                    <p class="testimonial-thought"> Mantra has become a part of my life. It has changed my lifestyle and helped me to keep good and sound health at my 61 years of age.</p>
                                    <h5 class="person-name">Shib Sankar Banerjee<br>Retired person, Barrackpore</h5>
							
                                 </div>
                              </div>
                           </div>
						   <div class="item">
                              <div class="row">
                                 <div class="col-sm-4 text-center">
                                    <img src="<?php echo base_url(); ?>application/assets/images/testimonial2.jpg"  class="img-circle" style="width: 100px;height:100px;" >
                                 </div>
                                <div class="col-sm-8">
                                    <p class="testimonial-thought">In the busy and hectic life of today with all sinful food habit, the MMWL package from MANTRA is really a blessing from heaven.</p>
                                    <h5 class="person-name">Papiya Roy <br>Housewife, Dunlop, Baranagar</h5>
									
                                </div>
                              </div>
                           </div>
                        </div>
						<!--
						<a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                        <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a> -->
                     </div>
                  </div>
               </div>
            </div>
			 <a href="<?php echo base_url();?>about/mantra_testimonial" class="btn cutome-link-btn">More Testimonials</a>
            <li class="divider"></li>
			
			<li class="dropdown-header">Career</li>
            <p>If you want to stay fit and healthy throughout your life, then forget all “magic and tantra” and simply believe in the purity of “Mantra”!</p>
             <a href="javascript:void(0)" class="btn cutome-link-btn">Apply Now</a>
         </ul>
      </li>
   </ul>
</li>
<!-- end --->

		
	<!--Services -->
		
		<li class="dropdown mega-dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Services <span class="caret"></span></a>
				<ul class="dropdown-menu mega-dropdown-menu">
				<div class="container">
					<div class="row">
						<li class="col-sm-4">
							<ul>
								<li class="dropdown-header">Packages Offered</li>  
								Download Admision Form
							</ul>
						</li>
						<li class="col-sm-4">
							<ul>
								<li class="dropdown-header">Branch Wise Rate Chart</li>                            
									<p>If you want to stay fit and healthy throughout your life, then forget all “magic and tantra” and simply believe in the purity of “Mantra”!</p>
									<li><a href="javascript:void(0)" class="btn cutome-link-btn">View More</a></li>
							
							   
							</ul>
						</li>
						<li class="col-sm-4">
							<ul>
								<li class="dropdown-header">Branch Wise Classes & Consultancy Schedule</li>    
								<p>If you want to stay fit and healthy throughout your life, then forget all “magic and tantra” and simply believe in the purity of “Mantra”!</p>
									<li><a href="javascript:void(0)" class="btn cutome-link-btn">View More</a></li>
								
							</ul>
						</li>
						
					</div>
					</div>

				</ul>
		</li>
		
		<!-- End Services -->
		<li><a href="#">Event</a></li>
		<li><a href="#">Fitness Education</a></li>
		<li><a href="<?php echo base_url();?>nutrition">Nutrition</a></li>
		<li><a href="#">Gallery</a></li>
		<li><a href="#">Body Calculator</a></li>
		<li><a href="<?php echo base_url();?>contact">Contact Us</a></li>
		</ul>
			<!--	<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">My account <span class="caret"></span></a>
				  <ul class="dropdown-menu" role="menu">
					<li><a href="#">Action</a></li>
					<li><a href="#">Another action</a></li>
					<li><a href="#">Something else here</a></li>
					<li class="divider"></li>
					<li><a href="#">Separated link</a></li>
				  </ul>
				</li>
				<li><a href="#">My cart (0) items</a></li>
			  </ul> -->
	</div><!-- /.nav-collapse -->
	
	</nav>
	

<!-- Mobile Menu --
<div id="mobileMenu" class="sidenav">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
<div class="container-fluid">
   <div class="row">
      <div class="col-md-12">
         <div id="mobile-menu-main">
            <div class="list-group panel">
               <a href="<?php echo base_url();?>" class="list-group-item">Home</a>
               <a href="#about-sub" class="list-group-item" data-toggle="collapse" data-parent="#mobile-menu-main">About<span class="caret"></span></a>
               <div class="collapse" id="about-sub">
                  <a href="<?php echo base_url();?>about/about_us" class="list-group-item" >About Us</a>
                  <a href="<?php echo base_url();?>about/mission_and_vision" class="list-group-item" >Mission & Vision</a>
                  <a href="<?php echo base_url();?>about/life_style_health_club" class="list-group-item" >1st Life Style Health Club</a>
                  <a href="#" class="list-group-item" >Team Mantra</a>
                  <a href="#" class="list-group-item" >Testimonials</a>
                  <a href="#" class="list-group-item" >Career</a>
               </div>
               <a href="#services-sub" class="list-group-item" data-toggle="collapse" data-parent="#mobile-menu-main">Services<span class="caret"></span></a>
               <div class="collapse" id="services-sub">
                  <a href="#" class="list-group-item">Packages Offered</a>
                  <a href="#" class="list-group-item">Branch Wise Rate Chart</a>
                  <a href="#" class="list-group-item">Branch Wise Classes & Consultancy Schedule</a>
                  <a href="#" class="list-group-item">Team Mantra</a>
                  <a href="#" class="list-group-item">Testimonials</a>
                  <a href="#" class="list-group-item">Career</a>
               </div>
               <a href="#" class="list-group-item">Events</a>
               <a href="#" class="list-group-item">Fitness Education</a>
               <a href="#" class="list-group-item">Nutrition</a>
               <a href="#gallery-sub" class="list-group-item" data-toggle="collapse" data-parent="#mobile-menu-main">Gallery<span class="caret"></span></a>
               <div class="collapse" id="gallery-sub">
                  <a href="#" class="list-group-item">Photo Gallery</a>
                  <a href="#" class="list-group-item">Video Gallery</a>
               </div>
               <a href="#calulator-sub" class="list-group-item" data-toggle="collapse" data-parent="#mobile-menu-main">Body Calculator<span class="caret"></span></a>
               <div class="collapse"  id="calulator-sub">
                  <a href="#" class="list-group-item">Body Fat %</a>
                  <a href="#" class="list-group-item">Harvard Step Test</a>
                  <a href="#" class="list-group-item">Sit & Reach Test</a>
                  <a href="#" class="list-group-item">Push Up & Sit Up Test</a>
               </div>
               <a href="<?php echo base_url();?>contact" class="list-group-item">Contact Us</a>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- end Mobile Menu-->


        <!-- Pushy Menu -->
        <nav class="pushy pushy-left" data-focus="#first-link">
            <div class="pushy-content">
                <ul>
					<li class="pushy-link"><a href="<?php echo base_url();?>">Home</a></li>
                    <li class="pushy-submenu">
                        <button id="first-link">About <span class="glyphicon glyphicon-chevron-down" style="float:right;"></span></button> 
                        <ul>
                            <li class="pushy-link"><a href="<?php echo base_url();?>about/about_us">  About Us</a></li>
                            <li class="pushy-link"><a href="<?php echo base_url();?>about/mission_and_vision">Mission & Vision</a></li>
                            <li class="pushy-link"><a href="<?php echo base_url();?>about/life_style_health_club">1st Life Style Health Club</a></li>
							<li class="pushy-link"><a href="#">Team Mantra</a></li>
							<li class="pushy-link"><a href="<?php echo base_url();?>about/mantra_testimonial">Testimonials</a></li>
							<li class="pushy-link"><a href="#">Career</a></li>
                        </ul>
                    </li>
                    <li class="pushy-submenu">
                        <button>Services <span class="glyphicon glyphicon-chevron-down" style="float:right;"></span></button>
                        <ul>
							<li class="pushy-link"><a href="#">Packages Offered</a></li>
							<li class="pushy-link"><a href="#">Branch Wise Rate Chart</a></li>
							<li class="pushy-link"><a href="#">Branch Wise Classes & Consultancy Schedule</a></li>
                        </ul>
                    </li>
					<li class="pushy-link"><a href="#" >Fitness Education</a></li>
					<li class="pushy-link"><a href="<?php echo base_url();?>nutrition" >Nutrition</a></li>
                    <li class="pushy-submenu">
                        <button>Gallery <span class="glyphicon glyphicon-chevron-down" style="float:right;"></span></button>
                        <ul>
							<li class="pushy-link"><a href="#">Photo gallery</a></li>
                            <li class="pushy-link"><a href="#">Video Gallery</a></li>
                        </ul>
                    </li>
                    <li class="pushy-submenu">
                        <button>Body Calculator <span class="glyphicon glyphicon-chevron-down" style="float:right;"></span></button>
                        <ul>
                            <li class="pushy-link"><a href="#">Body Fat %</a></li>
                            <li class="pushy-link"><a href="#">Harvard Step Test</a></li>
                            <li class="pushy-link"><a href="#">Sit & Reach Test</a></li>
                            <li class="pushy-link"><a href="#">Push Up & Sit Up Test</a></li>
                        </ul>
                    </li>
                    <li class="pushy-link"><a href="<?php echo base_url();?>contact">Contact Us</a></li>
                    
                </ul>
            </div>
        </nav>

        <!-- Site Overlay -->
        <div class="site-overlay"></div>

  
</div>
</div>
	
	
	
	

	<!-- Mobile Menu -->
  
</div>

<section>


	<!-- End Mega Menu -->
	
	
	
    <div class="body-view">
 
     <?php if($bodyview)  : ?>  
    
                
        <?php $this->load->view($bodyview); ?>
 
 
     <?php
       endif; 
      ?>
    </div>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
					<div class="footer-section">
						<p>Copyright &copy; 2016 MANTRA. All Rights Reserved.</p>
					</div>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery ---->
    <script src="<?php echo base_url(); ?>application/assets/js/jquery.js"></script> 
	<!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>application/assets/js/bootstrap.min.js"></script>
	<script src="https://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.22&key=AIzaSyBFfcYfF1vd5f6Uv9SXPzqtgxeUuOkFzf0"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="<?php echo base_url(); ?>application/assets/js/jquery.bootstrap.newsbox.js"></script>
    <!--<script src="<?php echo base_url(); ?>application/assets/js/mapplace.js"></script>-->
	<script src="<?php echo base_url(); ?>application/assets/js/wow.min.js"></script>	
	<script src="<?php echo base_url(); ?>application/assets/js/mantra-style.js"></script>	
	<script src="<?php echo base_url(); ?>application/assets/js/pushy.min.js"></script>	
	<script src="<?php echo base_url(); ?>application/assets/js/get-pass.js"></script>	
	<script src="<?php echo base_url(); ?>application/assets/js/home/events.js"></script>	
	<script src="<?php echo base_url(); ?>application/assets/js/home/mayihelp.js"></script>	
	<script src="<?php echo base_url(); ?>application/assets/js/contact/contact-us.js"></script>	

    <!-- Script to Activate the Carousel -->

             
	
	<script>
	/*
jQuery(document).ready(function(){
    $(".dropdown").hover(
        function() { $('.dropdown-menu', this).fadeIn("fast");
        },
        function() { $('.dropdown-menu', this).fadeOut("fast");
    });
});
*/
$(document).ready(function(){
   /* $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("400");
            $(this).toggleClass('open');       
        }
    );*/
	
	$('.dropdown-toggle').dropdown(); 
	/*  $('#quote-carousel').carousel({
    pause: true,
    interval: 4000,
  }); */
});

// When the DOM is ready, run this function


/*
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("400");
            $(this).toggleClass('open');       
        }
    );
});*/
	
	
	new WOW().init();
              

  $("#upcoming-events").bootstrapNews({
            newsPerPage: 3,
            autoplay: false,
			pauseOnHover:true,
            direction: 'up',
            newsTickerInterval: 4000,
            onToDo: function () {
                //console.log(this);
            }
        }); 
		

  $("#latest-offers").bootstrapNews({
            newsPerPage: 1,
            autoplay: false,
			pauseOnHover:true,
            direction: 'up',
            newsTickerInterval: 4000,
            onToDo: function () {
                //console.log(this);
            }
        }); 


	var markers = [
    {
        "title": 'Barrackpore',
        "lat": '22.762343',
        "lng": '88.364582',
        "description": '4/2, S.N. Banerjee Road, Kolkata- 700 120'
    },
    {
        "title": 'Chiriamore',
        "lat": '22.619635',
        "lng": '88.379096',
        "description": '29F, B.T. Road, Kolkata- 700 002'
    },
    {
        "title": 'Sinthi',
        "lat": '22.6236',
        "lng": '88.37888',
        "description": 'OM Tower, 36/C, B.T. Road, Kolkata- 700 002'
    }
    ];
    window.onload = function () {
        LoadMap();
    }
    function LoadMap() {
        var mapOptions = {
            center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
            zoom: 10,
			scrollwheel: false,
			gestureHandling: 'cooperative',
			mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);
 
        //Create and open InfoWindow.
        var infoWindow = new google.maps.InfoWindow();
 
        for (var i = 0; i < markers.length; i++) {
            var data = markers[i];
            var myLatlng = new google.maps.LatLng(data.lat, data.lng);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: data.title
            });
 
            //Attach click event to the marker.
            (function (marker, data) {
                google.maps.event.addListener(marker, "click", function (e) {
                    //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
                    infoWindow.setContent("<div style = 'width:200px;min-height:40px'><b>"+ data.title + "</b></br>" + data.description + "</div>");
                    infoWindow.open(map, marker);
                });
            })(marker, data);
        }
    }

function openNav() {
   // document.getElementById("mobileMenu").style.width = "250px";
	$("#mobileMenu").css({
		"width":"250px"
	});
}

function closeNav() {
   // document.getElementById("mobileMenu").style.width = "0";
	$("#mobileMenu").css({
		"width":"0px"
	});
}
	
</script>

</body>

</html>