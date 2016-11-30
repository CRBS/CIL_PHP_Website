
<html>
<head>
	<title>CIL - <?php echo $page_title; ?></title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Favicon -->
	<!-- <link rel="shortcut icon" href="favicon.ico"> -->
        <link rel="icon" type="image/jpeg" href="/CCDB/img/icon.jpg" sizes="32x32" />
        
        
	<!-- Web Fonts -->
	<link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

	<!-- CSS Global Compulsory -->
	<link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/style.css">

	<!-- CSS Header and Footer -->
	<link rel="stylesheet" href="/assets/css/headers/header-default.css">
	<link rel="stylesheet" href="/assets/css/footers/footer-v1.css">

	<!-- CSS Implementing Plugins -->
	<link rel="stylesheet" href="/assets/plugins/animate.css">
	<link rel="stylesheet" href="/assets/plugins/line-icons/line-icons.css">
	<link rel="stylesheet" href="/assets/plugins/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="/assets/plugins/parallax-slider/css/parallax-slider.css">
	<link rel="stylesheet" href="/assets/plugins/owl-carousel/owl-carousel/owl.carousel.css">

	<!-- CSS Theme -->
	<link rel="stylesheet" href="/assets/css/theme-colors/default.css" id="style_color">
	<link rel="stylesheet" href="/assets/css/theme-skins/dark.css">

	<!-- CSS Customization -->
	<link rel="stylesheet" href="/assets/css/custom.css">
        <link href="/static/css/custom.d4ef5c8a635d.css" rel="stylesheet">
          <link rel="stylesheet" type="text/css" href="/resources/sckb.css">
          <link rel="stylesheet" type="text/css" href="/resources/waiting.css"> 
          <link rel="stylesheet" href="/js/sortable/css/sortable-theme-bootstrap.css" /> 
           <link rel="stylesheet" href="/js/sortable/css/sortable-theme-finder.css" />
   <!-- <link href="/NeuroKS/resources/Knowledge_Space_files/bootstrap.min.78e7f91c0c4c.css" rel="stylesheet"> -->
    <link href="/resources/Knowledge_Space_files/landing-page.c750721445d1.css" rel="stylesheet">
    <link href="/resources/Knowledge_Space_files/custom.d4ef5c8a635d.css" rel="stylesheet">
   
    
    
          
          	<!-- JS Global Compulsory -->
	<script type="text/javascript" src="/assets/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="/assets/plugins/jquery/jquery-migrate.min.js"></script>
	<script type="text/javascript" src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- JS Implementing Plugins -->
	<script type="text/javascript" src="/assets/plugins/back-to-top.js"></script>
	<script type="text/javascript" src="/assets/plugins/smoothScroll.js"></script>
	<script type="text/javascript" src="/assets/plugins/parallax-slider/js/modernizr.js"></script>
	<script type="text/javascript" src="/assets/plugins/parallax-slider/js/jquery.cslider.js"></script>
	<script type="text/javascript" src="/assets/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
	<!-- JS Customization -->
	<script type="text/javascript" src="/assets/js/custom.js"></script>
	<!-- JS Page Level -->
	<script type="text/javascript" src="/assets/js/app.js"></script>
	<script type="text/javascript" src="/assets/js/plugins/owl-carousel.js"></script>
	<script type="text/javascript" src="/assets/js/plugins/style-switcher.js"></script>
	<script type="text/javascript" src="/assets/js/plugins/parallax-slider.js"></script>
        <!-- Custom js -->
        <!-- <script src="/NeuroKS/application/views/js/fullscreen.js"></script> -->
        <!-- <script src="/NeuroKS/application/views/js/fullscreen_layout.js"></script> -->
        <script src="/js/sortable/js/sortable.min.js"></script>
        
        
        <link rel="stylesheet" href="/CIL/css/cil.css">
</head>


<body data-spy="scroll" data-target=".navbar" data-offset="50">
	<div class="wrapper">
		<!--=== Header ===-->
		<div class="header">
			<div class="container">
				<!-- Logo -->
				<a class="logo" href="/CCDB/index.php/CCDBPages/view/home">
					<img src="http://www.cellimagelibrary.org/pix/logo.jpg?1449872028" alt="Logo">
                                        
				</a>
                                
				<!-- End Logo -->


				<!-- Toggle get grouped for better mobile display -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="fa fa-bars"></span>
				</button>
				<!-- End Toggle -->
			</div><!--/end container-->

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
				<div class="container">
                    <?php
                        if(!isset($disableTopSearchBar))
                        {
                            
                    ?>
                    
                        
                    <?php
                        if(!isset($disableTopSearchPanel) || !$disableTopSearchPanel)
                        {
                            
                    ?>
                    <center><form action="/CCDB/index.php/CCDBSearch" method="post">
		    <input name="keywords" type="text" size="50" placeholder="Search">
                        
			<button class="btn-u btn-u-sm btn-u-blue" type="submit" >Go</button>
                       
									
							
                    </form></center>
                    <?php
                        }
                    ?>
                    
                    <?php
                        }
                        ?>
		      
					<ul class="nav navbar-nav">
		
                    <!-- Search Block -->
                    <?php
                        //if(!isset($disableTopSearchBar))
                        //{
                            
                    ?>
                    <!-- <li><center>			
                    <form action="/NeuroKS/index.php/Search" method="post">
		    <input name="keywords" type="text" size="50" placeholder="Search">
                        
			<button class="btn-u btn-u-sm btn-u-blue" type="submit" >Go</button>
                       
									
							
                    </form></center>			
		     </li>  -->
                     <?php
                       // }
                        ?>
                            
			<!-- End Search Block -->
                    <!-- <li>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                    </li> -->
                    <li>
                        <a href="/NeuroKS/index.php/About">About</a>
                    </li>
                    <li>
                        <a href="/NeuroKS/index.php/Contributors">Contributors</a>
                    </li>
                    <!-- <li>
                        <a href="/#examples">Examples</a>
                    </li> -->
	            <!-- <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
								Demo
							</a>

                      <ul class="dropdown-menu">
                      <li><a href="/NeuroKS/index.php/pages/view/Neocortical_pyramidal_cell">View demo</a></li>
                      <li><a href="#" data-toggle="modal" data-target="#demoModal">Configurations</a></li>
                      </ul>
                    </li> -->
		    <li>
			<!-- <a href="/NeuroKS/documentation.php">Documentation</a> -->
                        <a href="/NeuroKS/index.php/Documentation">Documentation</a>
		    </li>
                    

						
					</ul>
				</div><!--/end container-->
			</div><!--/navbar-collapse-->
		</div>

                
  
      </div>

  


  
  
  
  <script type="text/javascript">
		jQuery(document).ready(function() {
			App.init();
			OwlCarousel.initOwlCarousel();
			StyleSwitcher.initStyleSwitcher();
			
		});
</script>






