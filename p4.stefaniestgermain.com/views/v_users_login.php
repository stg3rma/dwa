<form method='POST' action='/users/p_login'>

	<h1>Welcome to P4 E-75 311! Please login.</h1>
	<br><br>

	Email<br>
	<input type='text' name='email'>
	<br>
	
	Password<br>
	<input type='password' name='password'>
	<br>

	<input type='submit'>

	<br>

	<? if($error): ?>
		<div class='error'>
			Login failed. Please double check your email and password.
		</div>
		<br>
	<? endif; ?>
	
	

</form> 
