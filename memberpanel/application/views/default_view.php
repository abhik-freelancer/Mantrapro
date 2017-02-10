<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mantra- Member panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>application/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>application/assets/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url(); ?>application/assets/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>application/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- Custom Style -->
	<link href="<?php echo base_url(); ?>application/assets/css/style.css" rel="stylesheet">
	
	<!-- Bootstrap datepicker -->
	<link href="<?php echo base_url(); ?>application/assets/css/bootstrap-datepicker.css" rel="stylesheet">
	<!-- Bootstrap datepicer end -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top dashbord-top-nav" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>memberdashboard">Member-panel</a>
                <input type="hidden" value="<?php echo base_url(); ?>" id="basepath"></input>      
            </div>
            <!-- Top Menu Items -->
           <ul class="nav navbar-right top-nav">
            <!--   <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                   <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>-->
              <!--  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo  $CUS_NAME; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <!--<li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>-->
                        <li>
                            <a href="<?php echo base_url(); ?>changepass"><i class="fa fa-fw fa-gear"></i> Change password</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url(); ?>logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav sidebar-dashboard">
                    <li class="active">
                        <a href="<?php echo base_url(); ?>memberdashboard"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                <!-- <li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                    </li>
                    <li>
                        <a href="tables.html"><i class="fa fa-fw fa-table"></i> Tables</a>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
                    </li>
                    <li>
                        <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                    </li>
                    <li>
                        <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>
                    <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
                    </li> -->
		  <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-user-md"></i> Health & Fitness <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li><a href="#">General Fitness Assessment</a></li>
                            <li><a href="#">General Medical Assessment</a></li>
                            <li><a href="#">Orthopaedic Screening</a></li>
                            <li><a href="#">Archieves</a></li>
                            <li><a href="#">Anthropometry</a></li>
                            <li><a href="#">Blood Test(s)</a></li>
                        </ul>
                    </li>
                    
                    
                     <li>
                         <a href="javascript:;" data-toggle="collapse" data-target="#portfolio"><i class="fa fa-user-md">
                             
                             </i> Portfolio <i class="fa fa-fw fa-caret-down"></i>
                         </a>
                        <ul id="portfolio" class="collapse">
                            <li><a href="<?php echo base_url(); ?>portfolio">Body Composition</a></li>
                            <li><a href="<?php echo base_url(); ?>portfolio/viewfolio">View folio</a></li>
                            
                        </ul>
                    </li>
                    
                    
                    
					<li><a href="#"><i class="fa fa-external-link-square"></i>
 Health Asset Value</a></li>
					<li><a href="#"><i class="fa fa-external-link-square"></i> Feedback</a></li>
					<li><a href="#"><i class="fa fa-external-link-square"></i> Applications</a></li>
					<li><a href="#"><i class="fa fa-external-link-square"></i> Dietary Management</a></li>
					<li><a href="#"><i class="fa fa-external-link-square"></i> Other Reports</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

       <!--content  inserted here--->
	     <?php if($bodyview)  : ?>  
    
                
        <?php $this->load->view($bodyview); ?>
 
 
		 <?php
		   endif; 
		  ?>
	   <!--content inserted here --->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>application/assets/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>application/assets/js/changepass/changepass.js"></script>
    <script src="<?php echo base_url(); ?>application/assets/js/profile/profile.js"></script>
    <script src="<?php echo base_url(); ?>application/assets/js/portfolio/portfolio.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>application/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>application/assets/js/bootstrap-confirmation.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url(); ?>application/assets/js/plugins/morris/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>application/assets/js/plugins/morris/morris.min.js"></script>
    <script src="<?php echo base_url(); ?>application/assets/js/plugins/morris/morris-data.js"></script>
    <script src="<?php echo base_url(); ?>application/assets/js/bootstrap-datepicker.js"></script>
	

</body>

</html>
