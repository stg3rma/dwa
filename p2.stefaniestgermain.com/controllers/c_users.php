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
		#print_r($_POST);

		# Prevent SQL injection attacks by sanitizing user entered data
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);
		
		#encrypt
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
		#can override password salt in application version in core config

		$_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());
		#token salt, users email, random string then hashed
		
		$_POST['created'] = Time::now(); #could mimic different time
		$_POST['modified'] = Time::now(); #time stamp	
		
		#check if the address is not in use in the system
		$q = "SELECT email
			FROM users WHERE email = '".$_POST['email']."'";

		$user_exists = DB::instance(DB_NAME)->select_field($q);

		if($user_exists != ""){	
			
			$address_in_use = "The email address you have entered is already in use. Please pick another.";
					
			Router::redirect("/users/signup/error->$address_in_use");
		}
		else{
		
		#$user_id = DB::instance(DB_NAME)->insert("users", $_POST);	
		$user_id =  DB::instance(DB_NAME)->insert("users", $_POST);

	
		# For now, just confirm they've signed up - we can make this fancier later
		#echo "You're registered! Now go <a href='/users/login'>login</a>";
		Router::redirect("/users/login");


		}		
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
		else 		
	
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
			"/stylesheets/style.css",   
			"/stylesheets/jquery-ui.css", 
	    );
	    
	    $this->template->client_files = Utils::load_client_files($client_files); 		

		
		# Render template
		echo $this->template;
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

  		#verify user exists
   		
   		#profile info via Helper
		$membership_duration = Helper::get_user_membership_length($user_id_passed);
		$last_post = Helper::get_date_of_last_post($user_id_passed);
		
		$count_followed = Helper::get_count_followed($user_id_passed); 
		$followers = Helper::get_count_following($user_id_passed);
		$image_path = Helper::get_image_path($user_id_passed);


		$profile_arr = "";
		$profile_arr["membership_duration"] = $membership_duration;
		$profile_arr["last_post"] = $last_post;
		$profile_arr["count_followed"] = $count_followed;
		$profile_arr["followers"] = $followers;
		$profile_arr["image_path"] = $image_path;

		$user_arr = "";
		$user_arr = Helper::get_user_info($user_id_passed);
		

	

		#Pass data to the view
		$this->template->content->profile_arr = $profile_arr;
		$this->template->content->user_arr = $user_arr;
		# Render template
		echo $this->template;
		}
	}

		public function myprofile() {
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
				
	
		$this->template->content = View::instance("v_users_myprofile");
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

  		#verify user exists
   		
   		#profile info via Helper
		$membership_duration = Helper::get_user_membership_length($this->user->user_id);
		$last_post = Helper::get_date_of_last_post($this->user->user_id);
		
		$count_followed = Helper::get_count_followed($this->user->user_id); 
		$followers = Helper::get_count_following($this->user->user_id);
		$image_path = Helper::get_image_path($this->user->user_id);
		

		
		$profile_arr = "";
		$profile_arr["membership_duration"] = $membership_duration;
		$profile_arr["last_post"] = $last_post;
		$profile_arr["count_followed"] = $count_followed;
		$profile_arr["followers"] = $followers;
		$profile_arr["image_path"] = $image_path;

		$image_arr = "";
		$image_arr = Helper::get_imagename($this->user->user_id);

		$user_arr = "";
		$user_arr = Helper::get_user_info($this->user->user_id);

		#Pass data to the view
		$this->template->content->profile_arr = $profile_arr;
		$this->template->content->user_arr = $user_arr;
		$this->template->content->image_arr = $image_arr;

		# Render template
		echo $this->template;
		}
	}

  
  public function edit($error = NULL){

  		# If user is blank, they're not logged in, show message and don't do anything else
		# Not logged in
		if(!$this->user) {
			echo "Members only. <a href='/users/login'>Please Login</a>";
			
			# Return will force this method to exit here so the rest of 
			# the code won't be executed and the profile view won't be displayed.
			return;
			
		}
		else{

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

    	# Setup view
		$this->template->content = View::instance('v_users_edit');
		$this->template->title   = "Edit your profile";

    	#Pass the data to the view
	    $this->template->content->error = $error;
			
		# Render template
		echo $this->template;

      }
  }



public function p_edit(){

  		# If user is blank, they're not logged in, show message and don't do anything else
		# Not logged in
		if(!$this->user) {
			echo "Members only. <a href='/users/login'>Please Login</a>";
			
		# Return will force this method to exit here so the rest of 
			return;
		}
		else{


		# Prevent SQL injection attacks by sanitizing user entered data
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);

		#if user changes password encrypt it
		if($_POST['password'] != $user->password){

			#encrypt
			$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
			#can override password salt in application version in core config

		}

		#if user did edit email verify that the address is not in use in the system
		if($user->email != $_POST['email']){

			$q = "SELECT email
				FROM users WHERE email = '".$_POST['email']."'";
					
			$user_exists = DB::instance(DB_NAME)->select_field($q);
			$address_in_use = "The email address you have entered is already in use. Please pick another.";
					
			if($user_exists == $_POST['email']){
			#echo "Email address in use in the system";
				Router::redirect("/users/edit/error->$address_in_use");
		}

		#Unix timestamp of when this post was modified
		$_POST['modified'] = Time::now(); 

		# Insert this post into the database
		$where_condition = 'WHERE user_id = '.$this->user->user_id;
		DB::instance(DB_NAME)->update("users", $_POST, "$where_condition");

		
		#Empty fields 
		#if($_POST['first_name'] == "" || $_POST['last_name'] == "" || $_POST['email'] == "" || $_POST['password']){
		#	Router::redirect("/users/edit/error");
		#}

		echo Debug::dump($_POST, "posts content before update");

		# Insert this user edit into the database
		#DB::instance(DB_NAME)->update("users", $_POST, "WHERE user_id = ".$user_id);
       #UPDATE `users` SET `modified`=$_POST['modified'],`password`=$_POST['password'],`email`=$_POST['email'],`first_name`=$_POST['password'],`last_name`=$_POST['password'] WHERE 'user_id' = $user_id;


		if($error){

			Router:: redirect("/users/edit/error");
		} 
		else{

			Router::redirect("/users/myprofile");
		}     

			
	}

    }

  }

		
} # end of the class