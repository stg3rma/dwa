
<h1>Please edit your profile</h1>
<br>

<form method='POST' id='user_edit' action='/users/p_edit'>

	First Name<br>
	<input type='text' name='first_name' value='<?=htmlspecialchars($user->first_name)?>'>
	<br><br>
	
	Last Name<br>
	<input type='text' name='last_name' value='<?=htmlspecialchars($user->last_name)?>'>
	<br><br>

	Email<br>
	<input type='text' name='email' value='<?=htmlspecialchars($user->email)?>'>
	<br><br>
	
	Password<br>
	<input type='password' name='password' value='<?=htmlspecialchars($user->password)?>'>
	<br><br>

	<input type='submit' value='Submit'>
	
</form>
<br>
<br>
	<? if($error): ?>
		<div class='error'>
			<?=$error; ?>
		</div>
		<br>
	<? endif; ?>