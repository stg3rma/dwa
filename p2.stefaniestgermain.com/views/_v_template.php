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
      <a href='/'><img src="/images/logo.gif" alt="P2 microblog logo"/></a>
    </div>
	<div id="topnav" >
		<!-- Menu for users who are logged in -->
		<ul>
		<? if($user): ?>
			<li><a class="button-link" href='/users/logout'>Logout</a></li>
			<li><a class="button-link" href='/posts/users/'>Follow|Unfollow</a></li>
			<li><a class="button-link" href='/posts/'>View posts</a></li>
			<li><a class="button-link" href='/posts/add'>Add Post</a></li>
			<li><a class="button-link" href='/profile/'>Profile</a></li>
		<!-- Menu options for users who are not logged in -->
		<? else: ?>
			<li><a class="button-link" href='/users/signup'>Sign up</a></li>
			<li><a class="button-link" href='/users/login'>Login</a></li>
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
   <a href='/'><img src="/images/footer.gif" alt="P2 microblog footer"/></a>
  </div>

</div><!--end two col -->
</body>
</html>