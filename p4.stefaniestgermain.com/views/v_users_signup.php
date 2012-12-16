
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
	<select id='zipcode_id' name='zipcode_id'>
		<option value="1">02138</option>
		<option value="2">02139</option>
		<option value="3">02140</option>
		<option value="4">02141</option>
		<option value="5">02142</option>          
    </select>
    <br>
    Access?<br>
    <select id ='admin' name='admin'>
    	<option value="0">user</option>
    	<option value="1">admin</option>
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