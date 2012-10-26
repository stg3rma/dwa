<?php

class profile_controller extends base_controller {

	public function __construct() {
		parent::__construct();

		#Make sure user is loggined in if they want to use anything in this controller
		if(!$this->user){
			die("Members only. <a href='/users/login'>Please Login</a>");
		}
	}

	public function addImage() {
		
		# Setup view
			$this->template->content = View::instance('v_profile_addImage');
			$this->template->title   = "Add an image to your profile";
			
		# Render template
			echo $this->template;
		
	}
	
	public function p_addImage(){
	
		echo $_POST;
		# Associate this image with this user
		$_POST['user_id'] = $this->user->user_id;

		#Unix timestamp of when this post was created/modified
		$_POST['created'] = Time::now(); 
		$_POST['modified'] = Time::now(); 

		#Upload the image
		#$file_obj = '';
		$filename = Upload::upload($file_obj, $upload_dir, $allowed_files, $new_file_name = NULL);

		# Insert this post into the database
		
		#DB::instance(DB_NAME)->insert("image", $_POST);
		#$imgObj = new Image(APP_PATH."uploads/test.png");	
		
		# For now, just confirm the post - make this fancier later
		echo "Your profile picture has just been addeded! <a href='/profile/'>Edit your profile?</a>";
	}

	public function index(){

}

	

	

		
} # end of the class