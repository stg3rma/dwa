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
  <script src="/js/leaflet.js"></script>  
  <script src="/js/zipcode_ca.js"></script>
	<!-- Controller Specific JS/CSS -->
	<?=@$client_files; ?>   
	

	<link rel="stylesheet" type="text/css" href="/stylesheets/jquery-ui.css"> 
	<link rel="stylesheet"href="/css/bootstrap.min.css"  media="screen">
	<link rel="stylesheet"href="/css/bootstrap.css"  media="screen">
	<link rel="stylesheet"href="/css/leaflet.css"  media="screen">
  <link rel="stylesheet"href="/css/p4.css" media="screen">

  <!-- modified the Twitter Boostrap CCS/layout from United theme from Bootswatch.com  -->
	
</head>


 <body>

  <!-- Navbar
    ================================================== -->
 <div class="navbar navbar-fixed-top">
   <div class="navbar-inner">
     <div class="container">
       
       <a class="brand" href="/"><h2>P4 E-75 311</h2></a>
       <div class="nav-collapse" id="main-menu">
        <ul class="nav pull-right" id="main-menu-right">
          <li><a class="btn" href="/users/signup" title="P4 E-75 311 Signup">signup</a> </li>
          <li><a class="btn" href="/users/login" title="P4 E-75 311 Login">login<a></li>
        </ul>
       </div>
     </div>
   </div>
</div>

    <div class="container">




	
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