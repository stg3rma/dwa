<form method='POST'  action='/users/p_signup'>

	First Name<br>
	<input type='text' name='first_name'>
	<br><br>
	
	Last Name<br>
	<input type='text' name='last_name'>
	<br><br>

	Email<br>
	<input type='text' name='email'>
	<br><br>
	
	Password<br>
	<input type='password' name='password'>
	<br><br>

	<? if($error): ?>
		<div class='error'>
			Signup failed. Please verify that all fields have been populated.
		</div>
		<br>
	<? endif; ?>
	
	<input type='submit' value='Submit'>
	
</form>