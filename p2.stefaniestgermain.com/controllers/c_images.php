<?php

class images_controller extends base_controller {

	public function __construct() {
		parent::__construct();
	} 

	public function upload() {
		
		# Setup view
			$this->template->content = View::instance("v_images_upload");
			$this->template->title   = "Upload Image";
			
		# Render template
			echo $this->template;
		
	}
	
	public function p_upload() {
		
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