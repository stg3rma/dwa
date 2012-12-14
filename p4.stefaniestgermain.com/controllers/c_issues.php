<?php

class issues_controller extends base_controller {

	public function __construct() {
		parent::__construct();

		#Make sure user is loggined in if they want to use anything in this controller
		if(!$this->user){
			die("Members only. <a href='/users/login'>Please Login</a>");
		} 
	}

	public function add($error = NULL) {
		
		# Setup view
			$this->template->content = View::instance('v_issues_add');
			$this->template->title   = "Report a new issue";

		# If this view needs any JS or CSS files, add their paths to this array so they will get loaded in the head
		$client_files = Array(
			"/js/jquery.form.js"
			
	    );
	    
	    $this->template->client_files = Utils::load_client_files($client_files); 
	    $current_issues = "";
	    $fullname = "";

	    #get recent posts and name to display below add post box
	    $id = $this->user->user_id;
		$current_issues = Helper::get_issues($id);
		$fullname = Helper::get_name($id);

		#Pass the data to the view
		$this->template->content->issues = $current_issues;
		$this->template->content->fullname = $fullname;		
	    $this->template->content->error = $error;
			
		# Render template
		echo $this->template;
		
	}
	
	public function p_add() {
		
		# Associate this post with this user
		$_POST['user_id'] = $this->user->user_id;

		#Unix timestamp of when this post was created/modified
		$_POST['created'] = Time::now(); 
		$_POST['modified'] = Time::now(); 

		# Insert this post into the database
		DB::instance(DB_NAME)->insert("issues", $_POST);

		#Empty post  
		if($_POST['description'] == "" || $_POST['description'] == NULL){
			Router::redirect("/issues/add/error");
		}

		# For now, just confirm the post - make this fancier later
		Router::redirect("/issues/");
	}

	public function index(){

		#Set up view
		$this->template->content = View::instance('v_issues_index');
		$this->template->title = "Issues";
		
		#Build a query of the issues this user reported 
		$q = "SELECT * FROM issues WHERE user_id = ".$this->user->user_id;
		

		#Execute our query storing the results in a variable $user_issues
		$user_issues = DB::instance(DB_NAME)->select_rows($q);
	
		if(empty($user_issues)) {
		# If the user has not reported issues, this prevents a SQL error
		$show_no_issues_message = "There are no issues.";

		$this->template->content->show_no_issues_message = TRUE;
		$this->template->content->show_issues = FALSE;
		

		}
		else{

		#Now let's build our query to grab the issues
		$q = "SELECT * FROM issues WHERE user_id = ".$this->user->user_id;
		#This is where we use string of user_ids we created

		#Run our query and store results in the variable $issues
		
		$issues = DB::instance(DB_NAME)->select_rows($q);

		$this->template->content->show_no_issues_message = FALSE;
		$this->template->content->show_issues = TRUE;
		$this->template->content->issues = $issues;
		}
			


		# If this view needs any JS or CSS files, add their paths to this array so they will get loaded in the head
		$client_files = Array(
			"/js/usermap.js",
			"/css/cloropleth.css",
			"/css/MarkerCluster.css",
			"/css/MarkerCluster.Default.css",
			"/css/MarkerCluster.Default.ie.css",
			"/js/leaflet.markercluster.js",
			"/js/zipcode_ca.js",
			"/js/cambridge_02138.js",
			"/js/cambridge_02139.js",
			"/js/cambridge_02140.js",
			"/js/cambridge_02141.js",
			"/js/cambridge_02142.js"

	   
	    );
	    
	    $this->template->client_files = Utils::load_client_files($client_files); 		


 		#Render the view
		echo $this->template;
		
	}

	public function users(){

		#Set up the view
		$this->template->content = View::instance("v_posts_users");
		$this->template->title = "Users";

		#Build our query to get all the users
		$q = "SELECT * FROM users where user_id != ".$this->user->user_id; #SAS add where to excluded logged in user

		#Execute the query to get all the users. Store the result array in the variable $users
		$users = DB::instance(DB_NAME)->select_rows($q);

		#Build query to figure out what connections does this user have - ie who are they following
		$q = "SELECT * FROM users_users WHERE user_id = ".$this->user->user_id;

		#Execute this query with the select_array method
		#select_array will return our results in an array and use the user_id_followed
		#field as the index. This will come in handy when we get into the view. Store our
		#results (an array) in the variable $connections

		$connections = DB::instance(DB_NAME)->select_array($q,'user_id_followed');

		#Pass data (users and connections) to the view
		$this->template->content->users = $users;
		$this->template->content->connections = $connections;

		# If this view needs any JS or CSS files, add their paths to this array so they will get loaded in the head
		$client_files = Array(
			
	    );
	    
	    $this->template->client_files = Utils::load_client_files($client_files); 		


		#Render the view
		echo $this->template;

	}

	


		
} # end of the class