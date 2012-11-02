<? if(!$user): ?>
	<h1><strong>Welcome the P2 Microblog!</strong></h1> 
	<br>
	<p>Please <a href='/users/signup'>Sign up</a> to create an account to start posting. If you an existing user, please <a href='/users/login'>Login</a>                      
<? else: ?>
	<h1>Welcome back <strong><?=$user->first_name?></strong><h1><br>
	<a href='/users/logout'>Logout</a> |
	<a href='/users/profile/$user'>Profile</a>
<? endif; ?>
	<br>
	<br>



