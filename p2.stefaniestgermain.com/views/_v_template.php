<!DOCTYPE html>
<html>
<head>
	<title><?=@$title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	
	<!-- JS -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
			
	<!-- Controller Specific JS/CSS -->
	<?=@$client_files; ?>   
	

	<link rel="stylesheet" type="text/css" href="/stylesheets/jquery-ui.css"> 


	
</head>

<body>	
	<div id="wrapper">
	<div id="header">
      <h1>P3 | interactive map</h1>
    </div>
	<div id="topnav" >
		<!-- Menu for users who are logged in 
		<ul>
			<li><a class="button-link" href='/users/signup'>Sign up</a></li>
			<li><a class="button-link" href='/users/login'>Login</a></li>		
		</ul>		-->
	</div>		
	
		<?=$content;?> 
	
  <div id="footer">
    <h3>Stefanie St. Germain</h3>
  </div>
</div>
</body>
</html>