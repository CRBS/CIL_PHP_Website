<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="nl"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="nl"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang="nl"><![endif]-->
<!--[if IE]><html class="no-js ie" lang="nl"><![endif]-->
<!--[if !IE]><!--><html class="no-js" lang="nl"><!--<![endif]-->

	<head>

		<meta charset="utf-8">
		<title><?php
                
                    if(isset($title))
                        echo $title;
                    else
                        echo "The Cell Image Library";
                
                ?></title>
		<meta name="description" content="Page description here">
		<meta name="author" content="BigBase - D. Tiems">
		<meta name="viewport" content="width=device-width">
                
                	<!-- CSS Global Compulsory -->
                <link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css">
                <link rel="stylesheet" href="/assets/css/style.css"> 
                
		<!--<link rel="stylesheet" href="https://apps.bigbase.nl/templates/data/web/5001-6/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="https://apps.bigbase.nl/templates/data/web/5001-6/css/style.css">
		<link rel="stylesheet" href="https://apps.bigbase.nl/templates/data/web/5001-6/css/nivo-slider.css">
		<link rel="stylesheet" href="https://apps.bigbase.nl/templates/data/web/5001-6/css/colorbox.css">
		<link rel="stylesheet" href="https://apps.bigbase.nl/templates/data/web/5001-6/nivo-themes/bar/bar.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="https://apps.bigbase.nl/templates/data/web/5001-6/nivo-themes/light/light.css" type="text/css" media="screen" />
		<script src="https://apps.bigbase.nl/templates/data/web/5001-6/js/config.js"></script>
		<script src="https://apps.bigbase.nl/templates/data/web/5001-6/js/modernizr-3.3.1.min.js"></script>
		<script src="https://apps.bigbase.nl/templates/data/web/5001-6/js/jquery-1.12.4.min.js"></script>
		<script src="https://apps.bigbase.nl/templates/data/web/5001-6/bootstrap/js/bootstrap.min.js"></script>
		<script src="https://apps.bigbase.nl/templates/data/web/5001-6/js/jquery.nivo.slider.pack.js"></script>
		<script src="https://apps.bigbase.nl/templates/data/web/5001-6/js/jquery.colorbox-1.6.4.min.js"></script>
		<script src="https://apps.bigbase.nl/templates/data/web/5001-6/js/respond.min.js"></script>
		<script src="https://apps.bigbase.nl/templates/data/web/5001-6/js/script.js"></script> -->
               
		<link rel="stylesheet" href="/template/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="/template/css/style.css">
		<link rel="stylesheet" href="/template/css/nivo-slider.css">
		<link rel="stylesheet" href="/template/css/colorbox.css">
		<link rel="stylesheet" href="/template/nivo-themes/bar/bar.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="/template/nivo-themes/light/light.css" type="text/css" media="screen" />
		<script src="/template/js/config.js"></script>
		<script src="/template/js/modernizr-3.3.1.min.js"></script>
		<script src="/template/js/jquery-1.12.4.min.js"></script>
		<script src="/template/bootstrap/js/bootstrap.min.js"></script>
		<script src="/template/js/jquery.nivo.slider.pack.js"></script>
		<script src="/template/js/jquery.colorbox-1.6.4.min.js"></script>
		<script src="/template/js/respond.min.js"></script>
		<script src="/template/js/script.js"></script>

                
        <link href="/old_cil/stylesheets/all.css?<?php echo rand(100000,99999999);   ?>" media="screen" rel="stylesheet" type="text/css" />
        <link href="/old_cil/stylesheets/reset.css?<?php echo rand(100000,99999999);   ?>" media="print" rel="stylesheet" type="text/css" />
        <link href="/old_cil/stylesheets/960.css?<?php echo rand(100000,99999999);   ?>" media="print" rel="stylesheet" type="text/css" />
        <!-- <link href="/old_cil/stylesheets/jquery.autocomplete.css?<?php  //echo rand(100000,99999999);   ?>" media="print" rel="stylesheet" type="text/css" /> -->
        <link href="/old_cil/stylesheets/grid.css?<?php echo rand(100000,99999999);   ?>" media="print" rel="stylesheet" type="text/css" />
        <link href="/old_cil/stylesheets/typography.css?<?php echo rand(100000,99999999);   ?>" media="print" rel="stylesheet" type="text/css" />
        <link href="/old_cil/stylesheets/buttons.css?<?php echo rand(100000,99999999);   ?>" media="print" rel="stylesheet" type="text/css" />
        <link href="/old_cil/stylesheets/application.css?<?php echo rand(100000,99999999);   ?>" media="print" rel="stylesheet" type="text/css" /> 
        
        
       
        <script src="/old_cil/javascripts/jquery-ui-1.8.16.custom.min.js?<?php echo rand(100000,99999999);   ?>" type="text/javascript"></script>
        <link href="/old_cil/stylesheets/jquery-ui-1.8.16.custom.css?<?php echo rand(100000,99999999);   ?>" media="screen" rel="stylesheet" type="text/css" />
        <script src="/old_cil/javascripts/all.js?<?php echo rand(100000,99999999);   ?>" type="text/javascript"></script>
        <script src="/old_cil/javascripts/jquery.jstree.js?<?php echo rand(100000,99999999);   ?>" type="text/javascript"></script>
        
        <!-----------Willy's customized js------------------------------>
        <script src="/js/search_results.js?<?php echo uniqid();   ?>" type="text/javascript"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <!-----------End Willy's customized js------------------------------>
        
        
                <link rel="stylesheet" href="/css/cil.css?<?php echo rand(100000,99999999);   ?>"> 
                
                <!-- <link rel='shortcut icon' type='image/x-icon' href='/pix/favicon.ico' /> -->
                
                <link rel="icon" href="/pix/favicon.ico" type="image/x-icon" />
                <link rel="shortcut icon" href="/pix/favicon.ico" type="image/x-icon" />
	</head>
        
 
        
        
        
	<body>

		<div class="row visible-print">
			<div class="col-xs-12">
				Alternate header for print version
			</div>
		</div>

		<!-- <div class="header-shadow"></div> -->

		<div class="container">

			<header>

				
				<!-- <div id="fb-root"></div> -->

				<!-- Div for shade line -->

				<!-- <div class="row hidden-print">
					<div class="hidden-xs col-sm-6 col-md-4 col-lg-4">
						<div class="header-action">

							

						</div>
					</div>
					 <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">

						
						 <nav class="navbar navbar-right header-nav" role="navigation">
							<ul class="nav navbar-nav">
								<li class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#">account</a>
									<ul class="dropdown-menu">
										<li>
											<div class="dropdown-content">
												<br>
												<form role="form">
													<input type="text" class="form-control" placeholder="Username"><br>
													<input type="password" class="form-control" placeholder="Password"><br>
													<button class="btn btn-default">reset</button>
													<button type="submit" class="btn btn-primary">login</button>
												</form> 
												<br>
											</div>
										</li>
									</ul>
								</li>
								<li><a href="column1.html">orders</a></li>
								<li><a href="column1.html">customer service</a></li>
							</ul>
						</nav> 
						

					</div> 
				</div>-->

				<div class="row header-top hidden-print">
					<div class="col-xs-12 col-sm-5 col-md-3 col-lg-3">

						<!-- START CONTENT ITEM -->
                                                <a href="/home" target="_self">
						<img src="/pix/logo.jpg?<?php echo rand();  ?>" alt="Logo" class="img-responsive">
                                                </a>
						<!-- END CONTENT ITEM -->

					</div>
					<div class="col-xs-12 col-sm-7 col-md-6 col-lg-5">
						<div class="row hidden-print">

							<!-- START CONTENT ITEM -->
							<div class="col-xs-12">
								<div class="navbar header-search-nav">
									<ul class="nav navbar-nav">
                                                                                <li><a href="/images/advanced_search">Advanced search</a></li>
										<li><a href="/contributors">Contributors</a></li>
										<li><a href="/pages/help">Help</a></li>
                                                                                <li><a href="/pages/contribute">Submit</a></li>
										<li><a href="column2.html">Login</a></li>
									</ul>
								</div>
							</div>
							<!-- END CONTENT ITEM -->

						</div>

						<div class="row hidden-print">
							<div class="col-xs-12">

								<!-- START CONTENT ITEM -->
                                                                <form action="/images" method="get">
                                                               <!-------------------------Autocomplete--------------------------------->
<script type="text/javascript">
$( function() {
$('#k').autocomplete({
    source: function (request, response) {
        $.getJSON("/autocomplete/general_terms/" + request.term, function (data) {
           if(data.length > 0)
            response(data);
        });
    },
    minLength: 2
    
});
 } );
</script>
                                                               <!-------------------------End Autocomplete--------------------------------->
								<div class="input-group form-search header-search">
									<input name="k" id="k" class="form-control search-query"  
                                                                             
                                                                               type="text" placeholder="Search all images..." value="<?php   
                                                                                    if(isset($keywords))
                                                                                        echo $keywords;
                                                                               ?>">
                                                                        <input type="hidden" name="simple_search" value="Search">
									<span class="input-group-btn">
                                                                            <button class="btn btn-default" type="submit">Search</button>
									</span>
                                                                        
								</div>
                                                                </form>
                                                                
								<!-- END CONTENT ITEM -->

							</div>
						</div>
						<br>
					</div>
					<div class="hidden-xs hidden-sm col-md-3 col-lg-4">
                                            
                                                    <a href="http://crbs.ucsd.edu/" target="_blank">
                                                    <img src="/pix/CRBS_LOGO.png" alt="CRBS" class="img-responsive" width="150px">
                                                    </a>
                
					</div>
				</div>
			</header>
        </div> <!-- container -->
        

                <div class="row hidden-print">
                    <div class="col-xs-12">

                        <!-- START CONTENT ITEM -->
                        <nav class="navbar navbar-default main-nav" role="navigation">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">menu</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse ">
                                <ul class="nav navbar-nav navbar-left">
                                                                    <li><a href="/home"><span class="glyphicon glyphicon-home"></span></a></li>
                                      <li <?php 
                                                                            if(isset($category) && strcmp($category, "cellprocess")== 0)
                                                                            {
                                                                                echo "class=\"active\"";
                                                                            }
                                                                            ?>><a href="/browse/cellprocess">Cell Process</a></li>
                
                                    <li <?php 
                                                                            if(isset($category) && strcmp($category, "cellcomponent")== 0)
                                                                            {
                                                                                echo "class=\"active\"";
                                                                            }
                                                                            ?>><a href="/browse/cellcomponent">Cell Component</a></li>
                                    <li <?php 
                                                                            if(isset($category) && strcmp($category, "celltype")== 0)
                                                                            {
                                                                                echo "class=\"active\"";
                                                                            }
                                                                            ?>><a href="/browse/celltype">Cell Type</a></li>
                                    <li <?php 
                                                                            if(isset($category) && strcmp($category, "organism")== 0)
                                                                            {
                                                                                echo "class=\"active\"";
                                                                            }
                                                                            ?>><a href="/browse/organism">Organism</a></li>
                                                                        <li <?php 
                                                                            if(isset($category) && strcmp($category, "datasets")== 0)
                                                                            {
                                                                                echo "class=\"active\"";
                                                                            }
                                                                            ?>><a href="/pages/datasets">Data Sets</a></li>
                                                                        <!-- <li><a href="order.html">Pivot View</a></li> -->
                                    
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <!-- <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-question-sign"></span></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="dropdown-content dropdown-content-wide">
                                                    <form class="col-xs-12 form-search">
                                                        <div class="input-group">
                                                            <input class="form-control search-query" type="text" placeholder="Type your question...">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-default" type="button">ok</button>
                                                            </span>
                                                        </div>
                                                    </form>
                                                </div>
                                            </li>
                                        </ul>
                                    </li> -->
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-envelope"></span></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="dropdown-content">
                                                    <address>
                                                        <strong>Center for Research in Biological Systems</strong><br>
                                                        Basic Science Building, Room 1000 <br/>
                                                        University of California, San Diego<br/>
                                                                                                                9500 Gilman Drive<br/>
                                                                                                                La Jolla, CA 92093-0608, USA<br/>
                                                    </address>
                                                </div>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <div class="dropdown-content">
                                                    <strong>Voice</strong>: (858) 534-0276<br/>
                                                                                                        <strong>Fax</strong>: (858) 534-7497<br/>
                                                </div>
                                            </li>
                                                                                        <li>
                                                <div class="dropdown-content">
                                                    <strong>Email</strong>: dorloff@ncmir.ucsd.edu<br/>
                                                                                                        
                                                </div>
                                            </li>
                                            <li class="divider"></li>
                                            <li><a href="contact.html"><strong>E-mail</strong>: info@example.com</a></li>
                                        </ul>
                                    </li>
                                    
                                </ul>
                            </div>
                            </div>
                        </nav>
                        <!-- END CONTENT ITEM -->

                    </div>
                </div>
