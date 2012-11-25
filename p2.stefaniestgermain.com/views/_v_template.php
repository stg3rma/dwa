<!DOCTYPE html>
<html>
<head>
	<title><?=@$title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	
	<!-- JS -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>		
	<script src="/js/bootstrap.js"></script>	
	<!-- Controller Specific JS/CSS -->
	<?=@$client_files; ?>   
	

	<link rel="stylesheet" type="text/css" href="/stylesheets/jquery-ui.css"> 
	<link rel="stylesheet"href="/css/bootstrap.min.css"  media="screen">
	<link rel="stylesheet"href="/css/bootstrap.css"  media="screen">
	<link rel="stylesheet"href="/css/bootstrap-responsive.min.css"  media="screen">

	
</head>

<body>	
 <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href=""/javascript/interactive_ma""><h1>P3 | interactive map</h2></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><h2><a href="/javascript/interactive_ma">Reset Map</a></h2></li>&nbsp;
              <li><h2><a id="showhidemapsetup" href="#">Edit Map</a></h2></li>&nbsp;
              <li><h2><a id="showhidepagesetup" href="#">Edit Page</a></h2></li>&nbsp;
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">

	
		<?=$content;?> 
	</div> <!-- /container -->
  
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap-transition.js"></script>
    <script src="/js/bootstrap-alert.js"></script>
    <script src="/js/bootstrap-modal.js"></script>
    <script src="/js/bootstrap-dropdown.js"></script>
    <script src="/js/bootstrap-scrollspy.js"></script>
    <script src="/js/bootstrap-tab.js"></script>
    <script src="/js/bootstrap-tooltip.js"></script>
    <script src="/js/bootstrap-popover.js"></script>
    <script src="/js/bootstrap-button.js"></script>
    <script src="/js/bootstrap-collapse.js"></script>
    <script src="/js/bootstrap-carousel.js"></script>
    <script src="/js/bootstrap-typeahead.js"></script>

</body>
    
</html>