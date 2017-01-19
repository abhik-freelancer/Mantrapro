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
             <div class="col-md-12"> 
				<img src="<?php echo base_url(); ?>application/assets/images/header_img.png" height="150" width="100%"/> 
			 </div>
        </div>
    </div> 
	<!-- Navigation -->
    <nav class="navbar navbar-default custom-nav" data-spy="affix" data-offset-top="147" id="navbar-main">
       
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
    <script src="<?php echo base_url(); ?>application/assets/js/jquery.bootstrap.newsbox.js"></script>
    <!--<script src="<?php echo base_url(); ?>application/assets/js/mapplace.js"></script>-->
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

	
	
</script>

</body>

</html>