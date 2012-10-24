<?php

class posts_controller extends base_controller {

	public function __construct() {
		parent::__construct();

	#Make sure user is loggined in if they want to use anything in this controller
	if(!$this->user){
		die("Members only. <a href='/users/login'>Login</a>");
	}
	}

	public function add() {
		
		# Setup view
			$this->template->content = View::instance('v_posts_add');
			$this->template->title   = "Add a new post";
			
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
		
		# For now, just confirm the post - make this fancier later
		echo "Your post has been added! <a href='/posts/add'>Add Another Post?</a>";
	}

	public function index(){

		#Set up view
		$this->template->content = View::instance('v_posts_index');
		$this->template->title = "Posts";

		#Build the query
		$q = "SELECT * FROM posts JOIN users USING (user_id)";

		#Run the query grabbing all the posts and joining in the users
		$posts = DB::instance(DB_NAME)->select_rows($q);

		#Pass the data to the view
		$this->template->content->posts = $posts;

		#Render the view
		echo $this->template;
	}

	public function users(){

		#Set up the view
		$this->template->content = View::instance("v_posts_users");
		$this->template->title = "Users";

		#Build our query to get all the users
		$q = "SELECT * FROM users";

		#Execute the query to get all the users. Store the result array in the variable $users
		$users = DB::instance(DB_NAME)->select_rows($q);

		#Build query to figure out what connections does this user have - ie who are they following
		$q = "SELECT * FROM users_users WHERE user_id = ".$this->user->user_id;

		#Execute this query with the select_array method
		#select_array will return our results in an array and use the users_id_followed
		#field as the index. This will come in handy when we get into the view. Store our
		#results (an array) in the variable $connections

		$connections = DB::instance(DB_NAME)->select_array($q,'users_id_followed');

		#Pass data (users and connections) to the view
		$this->template->content->users = $users;
		$this->template->content->connections = $connections;

	}

	
		
} # end of the class