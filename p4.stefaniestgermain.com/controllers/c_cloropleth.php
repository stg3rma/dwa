<?php

class cloropleth_controller extends base_controller {

	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		parent::__construct();
	}
	

	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function index() {
		
		# Set up the view
		$this->template->content = View::instance("v_cloropleth_index");
		
		# Specify what JS/CSS files we need to load in the view
		$client_files = Array(
			"/js/zipcode_ca.js",
			"/js/cloropleth.js"

			);
			
		# Load the above specified files
		$this->template->client_files = Utils::load_client_files($client_files);
		
		# Render the view
		echo $this->template;
		
	}
	
	

}