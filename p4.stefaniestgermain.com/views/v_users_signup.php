
<form method='POST' id='users_signup' action='/users/p_signup'>
	<br>
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
	<select id='zipcode' name='zipcode'>
		<option value="02138">02138</option>
		<option value="02139">02139</option>
		<option value="02140">02140</option>
		<option value="02141">02141</option>
		<option value="02142">02142</option>          
    </select>
    <br>
    Access?<br>
    <select id ='admin' name='admin'>
    	<option value="user">user</option>
    	<option value="admin">admin</option>
	</select>      
	       
    <br>
	<input type='submit' value='Submit'>
	<br>
	<br>
	<div class="alert alert-info">
    <? if($error): ?>
		<div class='error'>
			<?	 echo $error ?>
		</div>
	<? endif; ?>
    </div>

	
</form>