<?php

class javascript_controller extends base_controller {

	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		parent::__construct();
	}
	

	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function interactive_ma() {
		
		# Set up the view
		$this->template->content = View::instance("v_javascript_interactive_ma");
		
		# Specify what JS/CSS files we need to load in the view
		$client_files = Array(
			"/js/interactive_ma.js",
			"/js/leaflet.js",
			"/css/interactive_ma.css",
			"/css/leaflet.css",
			);
			
		# Load the above specified files
		$this->template->client_files = Utils::load_client_files($client_files);
		
		# Render the view
		echo $this->template;
		
	}
	
	

}