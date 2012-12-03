<?php

class posts_controller extends base_controller {

	public function __construct() {
		parent::__construct();

		#Make sure user is loggined in if they want to use anything in this controller
		if(!$this->user){
			die("Members only. <a href='/users/login'>Please Login</a>");
		}
	}

	public function add($error = NULL) {
		
		# Setup view
			$this->template->content = View::instance('v_posts_add');
			$this->template->title   = "Add a new post";

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
	    $current_posts = "";
	    $fullname = "";

	    #get recent posts and name to display below add post box
	    $id = $this->user->user_id;
		$current_posts = Helper::get_posts($id);
		$fullname = Helper::get_name($id);

		#Pass the data to the view
		$this->template->content->posts = $current_posts;
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
		DB::instance(DB_NAME)->insert("posts", $_POST);

		#Empty post  
		if($_POST['content'] == "" || $_POST['content'] == NULL){
			Router::redirect("/posts/add/error");
		}

		# For now, just confirm the post - make this fancier later
		Router::redirect("/posts/add/");
	}

	public function index(){

		#Set up view
		$this->template->content = View::instance('v_posts_index');
		$this->template->title = "Posts";
		
		#Build a query of the users this user is following - we are only interested
		#in their posts
		$q = "SELECT * FROM users_users WHERE user_id = ".$this->user->user_id;

	
		#Execute our query storing the results in a variable $connections
		$connections = DB::instance(DB_NAME)->select_rows($q);

 		
		#In order to query for the posts we need, we're going to need a string of user ids
		#separated by commas. To create this, loop through our connections array
		$connections_string = "";
		foreach($connections as $connection){
			$connections_string .= $connection['user_id_followed'].",";
		}

		#Remove the final comma
		$connections_string = substr($connections_string, 0, -1);

		if(empty($connections_string)) {
		# If the user isn't following anyone, this prevents a SQL error
		$show_no_follower_message = "You haven't followed anyone. Follow people <a href=\"/posts/users\">here</a>.";
		$show_no_posts_message = "There are no posts.";

		$this->template->content->show_no_follower_message = TRUE;
		$this->template->content->show_no_posts_message = TRUE;
		$this->template->content->show_posts = FALSE;
		

		}
		else{


		#Now let's build our query to grab the posts
		$q = "SELECT * from posts
			JOIN users USING (user_id)
			WHERE posts.user_id IN (".$connections_string.")"; 
			#This is where we use string of user_ids we created

		#Run our query and store results in the variable $posts
		
		$posts = DB::instance(DB_NAME)->select_rows($q);

		$this->template->content->show_no_follower_message = FALSE;
		$this->template->content->show_no_posts_message = FALSE;
		$this->template->content->show_posts = TRUE;
		$this->template->content->posts = $posts;
		}
			
		


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


 		#Render the view
		echo $this->template;
		
	}


		
} # end of the class