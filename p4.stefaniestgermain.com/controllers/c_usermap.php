<?php

class usermap_controller extends base_controller {

	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		parent::__construct();
	}
	

	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function index() {
		
		# Set up the view
		$this->template->content = View::instance("v_usermap_index");
		
		# Specify what JS/CSS files we need to load in the view
		$client_files = Array(
	
			"/js/zipcode_ca.js",
			"/js/cambridge_02138.js",
			"/js/cambridge_02139.js",
			"/js/cambridge_02140.js",
			"/js/cambridge_02141.js",
			"/js/cambridge_02142.js"


		);
			
		# Load the above specified files
		$this->template->client_files = Utils::load_client_files($client_files);
		
		# Render the view
		echo $this->template;
		
	}
	
	

}