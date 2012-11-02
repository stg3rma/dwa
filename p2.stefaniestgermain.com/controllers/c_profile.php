<?php

class profile_controller extends base_controller {

	public function __construct() {
		parent::__construct();

		#Make sure user is loggined in if they want to use anything in this controller
		if(!$this->user){
			die("Members only. <a href='/users/login'>Please Login</a>");
		}
	}

	public function add_image() {
		
		# Setup view
			$this->template->content = View::instance('v_profile_add_image');
			$this->template->title   = "Add an image to your profile";

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
	
	public function p_add_image(){
	
		
		# Associate this image with this user
		$user_id = $this->user->user_id;
		$array = "";
		$file_obj = $this->$_FILES;

		Upload::upload($_FILES, "/uploads/avatars/", array("jpg", "jpeg", "gif", "png"), $user_id);

		# Insert this name into the database
		
		#DB::instance(DB_NAME)->insert("image", $_POST);
		#$imgObj = new Image(APP_PATH."uploads/test.png");	
		
		# For now, just confirm the post - make this fancier later
		echo "Your profile picture has just been addeded! <a href='/profile/'>Edit your profile?</a>";
	}

	public function index(){

		$imgObj = new Image(APP_PATH."/uploads/Chrysanthemum.jpg");	
		echo $imgObj->exists(TRUE);
		echo $this->$imgObj->image.open_image($imgObj);

	}






		
} # end of the class