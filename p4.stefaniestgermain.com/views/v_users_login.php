<form method='POST' action='/users/p_login'>

	<h1>Welcome to P2 microblog! Please login.</h1>
	<br><br>

	Email<br>
	<input type='text' name='email'>
	<br><br>
	
	Password<br>
	<input type='password' name='password'>
	<br><br>

	<input type='submit'>

	<br>

	<? if($error): ?>
		<div class='error'>
			Login failed. Please double check your email and password.
		</div>
		<br>
	<? endif; ?>
	
	

</form> 
