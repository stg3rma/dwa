<?php

class profile_controller extends base_controller {

	public function __construct() {
		parent::__construct();

		#Make sure user is logged in if they want to use anything in this controller
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



		#render the template
		echo $this->template;
	}


			

	
	public function p_add_image(){
	
		
		
		# The database has columns "imagename" and "title"

		$errors = array();
		$file_ext = strtolower(strrchr($_FILES['imagename']['name'], '.'));
		$file_size = $_FILES['imagename']['size'];
		$file_tmp = $_FILES['imagename']['tmp_name'];
		$extensions = array(".jpeg",".jpg",".png",".gif",".tif",".tiff");
		$file_name	= $this->user->user_id."-".Time::now().$file_ext;

		# Check to see if it's an image
		if(isset($_FILES['imagename'])){

			if(in_array($file_ext,$extensions) === false){
				Router::redirect("/profile/add_image?error=Only jpg, png or gif images please.");
			}

			else if($file_size > 2097152) {
			Router::redirect("/profile/add_image?error=Your file size is too big.");
			}	

			else {
				echo "Perfect file";

				# Save information

				$_POST['user_id'] = $this->user->user_id;
				$_POST['created'] = Time::now();
				$_POST['modified'] = Time::now();
				$_POST['imagename']	= $file_name;


				# Save to database
				DB::instance(DB_NAME)->insert('images', $_POST);

				# Save to your file path
				move_uploaded_file($file_tmp, APP_PATH."/uploads/avatars/".$file_name);

				#resize image

				# Create small (thumb)

				$imgObj = new Image(APP_PATH.AVATAR_PATH.$file_name);

				$small = Utils::postfix("_".SMALL_W."_".SMALL_H, APP_PATH.AVATAR_PATH.$file_name);

				$imgObj->resize(SMALL_W, SMALL_H, 'crop');
				$imgObj->save_image($small, 50);



				# Redirect
				Router::redirect("/profile/add_image?alert=Your image has been uploaded!");
			}

		}

		# Send an error message if it's not an image
		else {
			Router::redirect("/profile/add_image?error=Please select an image to upload");
		}
	}

	public function index(){

		$imgObj = new Image(APP_PATH."/uploads/Chrysanthemum.jpg");	
		echo $imgObj->exists(TRUE);
		echo $this->$imgObj->image.open_image($imgObj);

	}



/*-------------------------------------------------------------------------------------------------
http://techstream.org/Web-Development/PHP/Single-File-Upload-With-PHP
-------------------------------------------------------------------------------------------------*/
	public function p_edit_avatar() {

	if(isset($_FILES['image'])){

	$errors = array();
	$file_ext = strtolower(strrchr($_FILES['image']['name'], '.'));
	$file_name = $_POST['user_id'].$file_ext;	
	$file_size = $_FILES['image']['size'];
	$file_tmp = $_FILES['image']['tmp_name'];
	$file_type = $_FILES['image']['type'];

	$extensions = array(".jpeg",".jpg",".png",".gif");

	if(in_array($file_ext,$extensions) === false){
		Router::redirect("/users/edit-avatar?error=Only jpg, png or gif images please.");
	}

	if($file_size > 2097152) {
		Router::redirect("/users/edit-avatar?error=Your file size was too large; please choose an image smaller than 2mb");
	}

	if(empty($errors)==true) {
		move_uploaded_file($file_tmp, APP_PATH.AVATAR_PATH.$file_name);

	# Save to database
		DB::instance(DB_NAME)->update("users", Array("avatar" => $file_name), "WHERE user_id = ".$_POST['user_id']);

	# Create small (thumb)

		$imgObj = new Image(APP_PATH.AVATAR_PATH.$file_name);

		$small = Utils::postfix("_".SMALL_W."_".SMALL_H, APP_PATH.AVATAR_PATH.$file_name);

		$imgObj->resize(SMALL_W, SMALL_H, 'crop');
		$imgObj->save_image($small, 100);

	# Send them back to their profile
		Router::redirect("/users/edit-profile/");

		} 
		else {
				Router::redirect("/users/edit-avatar?error=There was an error uploading your image.");
		}
	  }	
	}


		
} # end of the class