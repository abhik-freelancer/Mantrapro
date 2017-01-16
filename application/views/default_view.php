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
  <!--  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet"> -->

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
     
    
    <div class="container-fluid page-width">
    
     <!-- Top Fixed Header -->
     <div class="container-fluid top-header">
         <div class="row">
             <div class="col-md-12"> <img src="<?php echo base_url(); ?>application/assets/images/header_img.png" height="150" width="100%"/></div>
         </div>
     </div>
     
    
    <!-- Navigation -->
    <nav class="navbar-inverse navbar-fixed-top custom-nav" role="navigation" style="top:150px;">
       
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>home">
				<!--<img src="<?php echo base_url(); ?>application/assets/images/logo.jpg" id="logo"/>-->
				
				</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="services.html">Services</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Portfolio <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="portfolio-1-col.html">1 Column Portfolio</a>
                            </li>
                            <li>
                                <a href="portfolio-2-col.html">2 Column Portfolio</a>
                            </li>
                            <li>
                                <a href="portfolio-3-col.html">3 Column Portfolio</a>
                            </li>
                            <li>
                                <a href="portfolio-4-col.html">4 Column Portfolio</a>
                            </li>
                            <li>
                                <a href="portfolio-item.html">Single Portfolio Item</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="blog-home-1.html">Blog Home 1</a>
                            </li>
                            <li>
                                <a href="blog-home-2.html">Blog Home 2</a>
                            </li>
                            <li>
                                <a href="blog-post.html">Blog Post</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Other Pages <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="full-width.html">Full Width Page</a>
                            </li>
                            <li>
                                <a href="sidebar.html">Sidebar Page</a>
                            </li>
                            <li>
                                <a href="faq.html">FAQ</a>
                            </li>
                            <li>
                                <a href="404.html">404</a>
                            </li>
                            <li>
                                <a href="pricing.html">Pricing Table</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
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
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery ---->
    <script src="<?php echo base_url(); ?>application/assets/js/jquery.js"></script> 
	<!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>application/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>application/assets/js/jquery.bootstrap.newsbox.js"></script>
	<script src="<?php echo base_url(); ?>application/assets/js/mantra-style.js"></script>	

    <!-- Script to Activate the Carousel -->
    <script>
	</script>
	
	<script>


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

// Code that uses other library's $ can follow here.
</script>

</body>

</html>