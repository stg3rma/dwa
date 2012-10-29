<? if(!$user): ?>
	<h1>Welcome the P2 Microblog</h1> 
	<p>Please signup to create an account to start posting.</p>
	<a href='/users/login'>Login</a> | 
	<a href='/users/signup'>Signup</a>
<? else: ?>
	<h1>Welcome back <?=$user->first_name?><h1><br>
	<a href='/users/logout'>Logout</a>
	<a href='/users/profile/$user'>Profile</a>
<? endif; ?>



