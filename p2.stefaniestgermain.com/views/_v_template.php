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
	
	<link rel="stylesheet" type="text/css" href="/stylesheets/style.css">   
	<link rel="stylesheet" type="text/css" href="/stylesheets/jquery-ui.css"> 


	
</head>

<body class="gradient-example" id="v-gradient">	
	<div class="two-col">
	<div id="header">
      <a href='/'><img src="/images/logo.gif" /></a>
    </div>
	<div id="topnav" >
		<!-- Menu for users who are logged in -->
		<ul>
		<? if($user): ?>
			<li><a href='/users/logout'>Logout</a></li>
			<li><a href='/posts/users/'>Follow/Unfollow</a></li>
			<li><a href='/posts/'>View posts</a></li>
			<li><a href='/posts/add'>Add a new post</a></li>
		<!-- Menu options for users who are not logged in -->
		<? else: ?>
			<li><a href='/users/signup'>Sign up</a></li>
			<li><a href='/users/login'>Log in</a></li>
		<? endif; ?>
		</ul>		
	</div>
	<div id="sidebar">
      <p>&nbsp;</p>
    </div>
    <div id="content">
	<br>

		<?=$content;?> 
	</div><!--end content -->
  <div id="footer">
   <a href='/'><img src="/images/footer.gif" /></a>
  </div>

</div><!--end two col -->
</body>
</html>