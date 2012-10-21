<?php

class pictures_controller extends base_controller {

	
	public function __construct() {
		parent::__construct();
	} 

	public function upload()) {
		
		# Setup view
			$this->template->content = View::instance("v_pictures_upload");
			$this->template->title   = "Upload";
			
		# Render template
			echo $this->template;
		
	}
	
	public function p_upload() {
		
		# Dump out the results of POST to see what the form submitted
		print_r($_POST);
		
		$imgObj = new Image(APP_PATH."$_POST['filename']");	
		echo $imgObj->exists(TRUE);

		open_image($filename);
		resize($new_width, $new_height, $option = "auto") ;
		get_dimensions($new_width, $new_height, $option);


		$user_id =  DB::instance(DB_NAME)->insert("pictures", $_POST);
		
		# For now, just confirm they've signed up - we can make this fancier later
		echo "You're signed up";
		echo "You're registered! Now go <a href='/users/login'>login</a>";
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