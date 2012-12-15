<?php

class admin_controller extends base_controller {

	public function __construct() {
		parent::__construct();

		#Make sure user is loggined in if they want to use anything in this controller
		if(!$this->user){
			die("Members only. <a href='/users/login'>Please Login</a>");
		} 
	}

	public function dashboard() {

	# Setup view
	$this->template->content = View::instance('v_admin_dashboard');

	# If this view needs any JS or CSS files, add their paths to this array so they will get loaded in the head
	$client_files = Array(
			 
	
	);


	# Render template
	echo $this->template;

	}

	public function p_dashboard() {	

	$data = Array();
	
	#issues by zip for cloropleth map
	$data['open_issues_02138'] = Helper::get_open_issues_by_zipid(1);
	$data['open_issues_02139'] = Helper::get_open_issues_by_zipid(2);
	$data['open_issues_02140'] = Helper::get_open_issues_by_zipid(3);
	$data['open_issues_02141'] = Helper::get_open_issues_by_zipid(4);
	$data['open_issues_02142'] = Helper::get_open_issues_by_zipid(5);
	#issues old & new totals
	$data['active_issues'] = Helper::get_active_issues();
	$data['closed_issues'] = Helper::get_closed_issues();
	$data['all_issues'] = Helper::get_all_issues();
	#active issues by type
	$data['category1'] = Helper::get_open_issues_by_catid(1);
	$data['category2'] = Helper::get_open_issues_by_catid(2);
	$data['category3'] = Helper::get_open_issues_by_catid(3);
	$data['category4'] = Helper::get_open_issues_by_catid(4);
	$data['category5'] = Helper::get_open_issues_by_catid(5);
	$data['category6'] = Helper::get_open_issues_by_catid(6);
	$data['category7'] = Helper::get_open_issues_by_catid(7);

	#send json results to the js
	echo json_encode($data);


	}



		
} # end of the class