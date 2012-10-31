<?php

class users_controller extends base_controller {

	public function __construct() {
		parent::__construct();
	} 

	public function signup($error = NULL) {
		
		# Setup view
		$this->template->content = View::instance("v_users_signup");
		$this->template->title   = "Signup";	

		#Pass data to the view
		$this->template->content->error = $error;
			 		
		# If this view needs any JS or CSS files, add their paths to this array so they will get loaded in the head
		$client_files = Array(
			"/stylesheets/screen.css", 
			"/stylesheets/print.css", 
  			"/stylesheets/ie.css",
  			"/stylesheets/validationEngine.jquery.css",
			"/stylesheet/template.css",
			"/js/languages/jquery.validationEngine-en.js", 
			"/js/jquery.validationEngine.js", 
  		
	    );
	    
	    $this->template->client_files = Utils::load_client_files($client_files); 		

		
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
		
		echo "Email address on form is: ".$_POST['email'];
		#check if email address is already in use
		
			$q = "SELECT user_id
				  FROM users WHERE email = '".$_POST['email']."'";
				
		$user_id_exists = DB::instance(DB_NAME)->select_field($q);
		
		#if(!$this->user){
		#	#echo "Registration failed! ";
		#	Router::redirect("/users/signup/error");
		#}
		#elseif($user_id_exists != "" || !NULL){
		#echo "Email address in use in the system";
		#	Router::redirect("/users/signup/error");
		#}	
		#else{
			$user_id =  DB::instance(DB_NAME)->insert("users", $_POST);

		#	$newuser = $this->user;

		#Create initial avatar
		#$newuser->create_initial_avatar($newuser->user_id);

			# For now, just confirm they've signed up - we can make this fancier later
			#echo "You're registered! Now go <a href='/users/login'>login</a>";
			Router::redirect("/");

		#}
		
	}

	public function login($error = NULL){
		#load the template
		$this->template->content= View::instance("v_users_login");

		#Pass data to the view
		$this->template->content->error = $error;

		# If this view needs any JS or CSS files, add their paths to this array so they will get loaded in the head
		$client_files = Array(
			"/stylesheets/screen.css", 
			"/stylesheets/print.css", 
  			"/stylesheets/ie.css",
  			"/stylesheets/validationEngine.jquery.css",
			"/stylesheet/template.css",
			"/js/languages/jquery.validationEngine-en.js", 
			"/js/jquery.validationEngine.js", 
	    );
	    
	    $this->template->client_files = Utils::load_client_files($client_files); 		

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
		if($token == "" || $_POST['email'] == "" || $_POST['password'] == ""){
			Router::redirect("/users/login/error");
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

			#send them to the main page
			Router::redirect("/");
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

		# If this view needs any JS or CSS files, add their paths to this array so they will get loaded in the head
		$client_files = Array(
			"/stylesheets/screen.css", 
			"/stylesheets/print.css", 
  			"/stylesheets/ie.css",
   			"/stylesheets/validationEngine.jquery.css",
			"/stylesheet/template.css",
			"/js/languages/jquery.validationEngine-en.js", 
			"/js/jquery.validationEngine.js", 
	    );
	    
	    $this->template->client_files = Utils::load_client_files($client_files); 		

		
		# Render template
		echo $this->template;
		}
	}

		public function profile_by_id($user_id_passed) {
		# If user is blank, they're not logged in, show message and don't do anything else
		# Not logged in
		if(!$this->user) {
			echo "Members only. <a href='/users/login'>Please Login</a>";
			
			# Return will force this method to exit here so the rest of 
			# the code won't be executed and the profile view won't be displayed.
			return;
			
		}
		else {

		#echo "user_id passed as parameter is".$user_id_passed;
				
	
		$this->template->content = View::instance("v_users_profile");
		$this->template->title   = "Profile of ".$this->user->first_name;

		# If this view needs any JS or CSS files, add their paths to this array so they will get loaded in the head
		$client_files = Array(
			"/stylesheets/screen.css", 
			"/stylesheets/print.css", 
  			"/stylesheets/ie.css",
  			"/stylesheets/validationEngine.jquery.css",
			"/stylesheet/template.css",
			"/js/languages/jquery.validationEngine-en.js", 
			"/js/jquery.validationEngine.js", 
	    );
	    
	    $this->template->client_files = Utils::load_client_files($client_files); 		

		
		# Render template
		echo $this->template;
		}
	}
		
} # end of the class