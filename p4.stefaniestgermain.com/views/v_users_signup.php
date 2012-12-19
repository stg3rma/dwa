	<script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#users_signup").validationEngine();
		});
            
	</script>
<form method='POST' id='users_signup' action='/users/p_signup'>
 <fieldset>
	<h3>Welcome to P4 E-75 311! Please signup.</h3>
	<legend>
		311 User Signup Form
	</legend>
		<label>
			<span>First Name: </span><br>
			<input value="" class="validate[required] text-input" type="text" name="first_name" id="first_name" />
		</label>
		<label>
			<span>Last Name: </span><br>
			<input value="" class="validate[required] text-input" type="text" name="last_name" id="last_name" />
		</label>
		<label>
		<span>Email: </span><br>
			<input value="" class="validate[required,custom[email]] text-input" type="text" name="email" id="email" />
		</label>
		<label>
			<span>Password: </span><br>
			<input value="" class="validate[required,equals[password]] " type="password" name="password" id="password" />
		</label>

	Zip Code<br><br>
	<select id='zipcode_id' name='zipcode_id'>
		<option value="1" selected>02138</option>
		<option value="2">02139</option>
		<option value="3">02140</option>
		<option value="4">02141</option>
		<option value="5">02142</option>          
    </select>
    <br>
    Access?<br>
    <select id ='admin' name='admin'>
    	<option value="0" selected>user</option>
    	<option value="1">admin</option>
	</select>      
		</fieldset>
		<input class="submit" type="submit" value="submit"/><hr/>
	</form>

	<div>
    <? if($error): ?>
		<div>
			<?	 echo $error ?>
		</div>
	<? endif; ?>
    </div>