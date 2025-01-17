<?php

 

class issues_controller extends base_controller {

 

	public function __construct() {

		parent::__construct();
		
		# Make sure user is loggined in if they want to use anything in this controller
		
		if(!$this->user){

			die("Members only. <a href='/users/login'>Please Login</a>");

		}
	}

	/*-------------------------------------------------------------------------------------------------
	-------------------------------------------------------------------------------------------------*/

	public function index(){

	# Set up view

	$this->template->content = View::instance('v_issues_index');
	$this->template->title = "Issues";


	#check if user is app admin
	$q = "SELECT admin from users WHERE user_id = ".$this->user->user_id;
	$admin = DB::instance(DB_NAME)->select_field($q);
	
	#return all active issues if admin
	if($admin == '1'){	
		$q = 'SELECT * FROM issues WHERE active = 1'; 
		$user_issues = DB::instance(DB_NAME)->select_rows($q);
	}
	else{
		# Build a query of the issues this user reported
		$q = 'SELECT * FROM issues WHERE active = 1 and user_id = '.$this->user->user_id .' ORDER BY issue_id DESC';
		$user_issues = DB::instance(DB_NAME)->select_rows($q);
	}

	# Execute our query storing the results in a variable $user_issues
	#$user_issues = DB::instance(DB_NAME)->select_rows($q);


	if(empty($user_issues)) {

		# If the user has not reported issues, this prevents a SQL error
		$show_no_issues_message = "There are no issues.";
		$this->template->content->show_no_issues_message = TRUE;
		$this->template->content->show_issues = FALSE;
		
	}

	else{

		#return all active issues if admin
		if($admin == '1'){	
			$q = 'SELECT * FROM issues WHERE active = 1'; 
			$issues = DB::instance(DB_NAME)->select_rows($q);
		}
		else{
			# Build a query of the issues this user reported
			$q = 'SELECT * FROM issues WHERE active = 1 and user_id = '.$this->user->user_id .' ORDER BY issue_id DESC';
			$issues = DB::instance(DB_NAME)->select_rows($q);
		}

		$this->template->content->show_no_issues_message = FALSE;
		$this->template->content->show_issues = TRUE;
		$this->template->content->issues = $issues;
	}

	# If this view needs any JS or CSS files, add their paths to this array so they will get loaded in the head

	$client_files = Array(

			"/js/usermap.js",
			"/js/cambridge_02138.js",
			"/js/cambridge_02139.js",
			"/js/cambridge_02140.js",
			"/js/cambridge_02141.js",
			"/js/cambridge_02142.js",
	);

	$this->template->client_files = Utils::load_client_files($client_files);	 

	# Render the view
	echo $this->template;

	}

	 

	/*-------------------------------------------------------------------------------------------------
	-------------------------------------------------------------------------------------------------*/

	public function p_load_issues() {

		echo self::get_markers();

	}

	/*-------------------------------------------------------------------------------------------------
	Triggered via Ajax by the addIssue form on /issues
	Returns JSON of all marks for the logged in user
	-------------------------------------------------------------------------------------------------*/

	public function p_add_issue() {

		# Associate this issue with this user
		$_POST['user_id'] = $this->user->user_id;

		# Unix timestamp of when this issue was created/modified
		$_POST['created'] = Time::now();
		$_POST['modified'] = Time::now();
		$_POST['active'] = 1;

		# Insert this issue into the database
		DB::instance(DB_NAME)->insert("issues", $_POST);

		# Get all the markers
		echo self::get_markers();

	}

	/*-------------------------------------------------------------------------------------------------

	Helper function
	Returns all markers (in JSON) for the logged in user

	-------------------------------------------------------------------------------------------------*/

	public function get_markers(){


		# Build our query to grab the issues
		$q = "SELECT issue_id, lat, lng, description FROM issues WHERE user_id = ".$this->user->user_id;

		# Run query and store results in the variable $issues
		$issues = DB::instance(DB_NAME)->select_rows($q);

		return json_encode($issues);

	}


	/*-------------------------------------------------------------------------------------------------
	-------------------------------------------------------------------------------------------------*/

	public function delete(){
	
		//rather than delete when issues are closed mark an inactive

		$data = Array("active" => "0");
		DB::instance(DB_NAME)->update_row('issues', $data,'WHERE issue_id = '.$_POST['issue_id']);
		//DB::instance(DB_NAME)->delete('issues', 'WHERE issue_id = '.$_POST['issue_id']);
	}

	/*-------------------------------------------------------------------------------------------------
	-------------------------------------------------------------------------------------------------*/	

	public function add($error = NULL) {

	# Setup view
	
	$this->template->content = View::instance('v_issues_add');
	$this->template->title = "Report a new issue";

	# If this view needs any JS or CSS files, add their paths to this array so they will get loaded in the head

	$client_files = Array(

		"/js/usermap.js",
		"/js/cambridge_02138.js",
		"/js/cambridge_02139.js",
		"/js/cambridge_02140.js",
		"/js/cambridge_02141.js",
		"/js/cambridge_02142.js"

	);

	$this->template->client_files = Utils::load_client_files($client_files);
	$current_issues = "";
	$fullname = "";

	# Get recent posts and name to display below add post box

	$id = $this->user->user_id;
	$current_issues = Helper::get_issues($id);
	$fullname = Helper::get_name($id);

	# Pass the data to the view

	$this->template->content->issues = $current_issues;
	$this->template->content->fullname = $fullname;	
	$this->template->content->error = $error;

	# Render template

	echo $this->template;

	}

	 

} # end of the class