	<script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#users_login").validationEngine();
		});
            
	</script>
  

  <form  id="users_login"  class="formular" method="post" action='/users/p_login'>
	<h3>Welcome to P4 E-75 311! Please login.</h3>
		<fieldset>
			<legend>
				311 User Login Form
			</legend>
			<label>
				<span>Email: </span>
				<input value="" class="validate[required,custom[email]] text-input" type="text" name="email" id="email" />
			</label>
			<label>
				<span>Password: </span>
				<input value="" class="validate[required,equals[password]] " type="password" name="password" id="password" />
			</label>
		</fieldset>
		<input class="submit" type="submit" value="submit"/><hr/>
	</form>
	

	<br>
</fieldset>
</form> 
	