<form method='POST' id='user_signup' action='/users/p_signup'>

	First Name<br>
	<input type='text' name='first_name'>
	<br>
	
	Last Name<br>
	<input type='text' name='last_name'>
	<br>

	Email<br>
	<input type='text' name='email'>
	<br>
	
	Password<br>
	<input type='password' name='password'>
	<br>

	Zip Code<br>
	<select id="zipcode">
		<option value="1">02138</option>
		<option value="2">02139</option>
		<option value="3">02140</option>
		<option value="4">02141</option>
		<option value="5">02142</option>          
    </select>
    <br>
    Admin Access?<br>
    <input type='radio' name='admin' value='0' checked="true"> no<br>
	<input type='radio' name='admin' value='1'> yes<br>
	
	       
    <br>
	<input type='submit' value='Submit'>
	<br>
	<? if($error): ?>
		<div class='error'>
			<?	 echo $error ?>
		</div>
	<? endif; ?>
	
</form>