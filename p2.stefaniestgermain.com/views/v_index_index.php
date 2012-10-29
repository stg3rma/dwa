<? if(!$user): ?>
	<h1>Welcome the P2 Microblog</h1> 
	<br>
	<p>Please <a href='/users/signup'>Signup</a> to create an account to start posting. If you an existing user, please <a href='/users/login'>Login</a>                      
<? else: ?>
	<h1>Welcome back <?=$user->first_name?><h1><br>
	<a href='/users/logout'>Logout</a> |
	<a href='/users/profile/$user'>Profile</a>
<? endif; ?>



