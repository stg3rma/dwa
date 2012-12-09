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
			"/js/usermap.js",
			"/css/cloropleth.css",
			"/css/MarkerCluster.css",
			"/css/MarkerCluster.Default.css",
			"/css/MarkerCluster.Default.ie.css",
			"/js/leaflet.markercluster.js",
			"/js/zipcode_ca.js"

		);
			
		# Load the above specified files
		$this->template->client_files = Utils::load_client_files($client_files);
		
		# Render the view
		echo $this->template;
		
	}
	
	

}