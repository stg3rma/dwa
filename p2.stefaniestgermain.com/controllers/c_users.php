<?php

class users_controller extends base_controller {

	public function __construct() {
		parent::__construct();
	} 

	public function signup() {
		
		# Setup view
			$this->template->content = View::instance("v_users_signup");
			$this->template->title   = "Signup";
			
		# Render template
			echo $this->template;
		
	}
	
	public function p_signup() {
		
		# Dump out the results of POST to see what the form submitted
		print_r($_POST);
		
		#encrypt
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
		#can override password salt in application version in core config


		$_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());
		#token salt, users email, random string then hashed
		
		$_POST['created'] = Time::now(); #could mimic different time
		$_POST['modified'] = Time::now(); #time stamp	
		# Insert this user into the database
		#$user_id = DB::instance(DB_NAME)->insert("users", $_POST);
		$user_id =  DB::instance(DB_NAME)->insert("users", $_POST);
		
		# For now, just confirm they've signed up - we can make this fancier later
		echo "You're signed up";
		echo "You're registered! Now go <a href='/users/login'>login</a>";
	}

	public function login(){
		#load the template
		$this->template->content= View::instance("v_users_login");

		#render the template
		echo $this->template;
	}

	public function p_login() {

		#hash of sumbitted password to compare to one in db
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

		# Prevent SQL injection attacks by sanitizing user entered data
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);
	
		$q = "SELECT token
			  FROM users
			  WHERE email = '".$_POST['email']."'
			  AND password = '".$_POST['password']."'
			 ";
				
		$token = DB::instance(DB_NAME)->select_field($q);
		
		#login failed
		if($token == "" || !$token){
			Router::redirect("/users/login");
			# send back to login page - should add indication what went wrong
		}
		#login successful
		else{	
			
			echo "if we find a token, the user is logged in. Token:".$token;

			#store token in a cookie
			setcookie("token", $token, strtotime('+2 weeks'), '/');

			#send them to the main page
			Router::redirect("/");

			#token name value and how long should last  
			#send back to index page
			#authenticate baked into base controller
			#gets users credentials this->user->firstname
		}
	}

	public function logout() {
			echo "display the logout page";

			#Generate and save a new token for next login
			$new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

			#Create the data array we'll use with the update method
			#In this case, we're only updatingin one field so our array has only one entry

			$data = Array("token" => $new_token);

			#Do the update
			DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");

			#Delete their token cookie effectively logging them out
			setcookie("token", "", strtotime('-1 year'), '/');

			echo "You have been logged out.";
	}
		
	
	public function profile() {
		# If user is blank, they're not logged in, show message and don't do anything else
		# Not logged in
		if(!$this->user) {
			echo "Members only. <a href='/users/login'>Please Login</a>";
			
			# Return will force this method to exit here so the rest of 
			# the code won't be executed and the profile view won't be displayed.
			return;
			
		}
		else {
				
	
		$this->template->content = View::instance("v_users_profile");
		$this->template->title   = "Profile of ".$this->user->first_name;
		
		# Render template
		echo $this->template;
		}
	}
		
} # end of the class