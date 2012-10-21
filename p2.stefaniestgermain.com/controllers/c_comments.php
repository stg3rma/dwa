<?php

class comments_controller extends base_controller {

	public function __construct() {
		parent::__construct();
	} 

	public function comment() {
		
		# Setup view
			$this->template->content = View::instance("v_comments_comment");
			$this->template->title   = "Comment";
			
		# Render template
			echo $this->template;
		
	}
	
	public function p_comment() {
		
		# Dump out the results of POST to see what the form submitted
		print_r($_POST);
		
		$_POST['user_id'] = $this->user->user_id;
		$_POST['created'] = Time::now(); #could mimic different time
		$_POST['modified'] = Time::now(); #time stamp	
		# Insert this comment into the database
		
		$comment_id =  DB::instance(DB_NAME)->insert("comments", $_POST);
		
		# For now, just confirm they've signed up - we can make this fancier later
		echo "You're signed up";
		echo "You're registered! Now go <a href='/users/profile'>profile</a>";
	}

	public getFollowersComments(){

		$q = "SELECT *
			  FROM comments
			  WHERE watcher_id = '"$this->user->user_id;"'
			  ";
				
		$follower_comments = DB::instance(DB_NAME)->select_field($q);


		#no follower comments
		if($follower_comments == "" || !$follower_comments){
			Router::redirect("/users/profile");
			# send back to profile - should add indication what went wrong
			echo "no follower commments to display";
		}
		#there are follower comments
		else{		

		$this->template->content = View::instance("v_users_profile");
		$this->template->title   = "Comments for ".$this->comments->comment;
		
		# Render template
		echo $this->template;
	}

	
		
} # end of the class