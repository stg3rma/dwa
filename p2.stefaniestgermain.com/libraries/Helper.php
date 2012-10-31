<?

class Helper {

  #Get membership length as string 
  public static function get_user_membership_length($user_id){

      $q = "SELECT date_format(FROM_unixtime(unix_timestamp(now()) - created),
      'P2 member for: %e days, %k hours, %i minutes, %s seconds ago.') FROM users WHERE user_id = ".$user_id;
      
      $user_membership_length = DB::instance(DB_NAME)->SELECT_field($q);
      return htmlspecialchars($user_membership_length);
  }

 
  # Get date of last post as string
  public static function get_date_of_last_post($user_id){

    #max created for most recent post creation
    $q = "SELECT date_format(FROM_unixtime(unix_timestamp(now()) - max(created)),
    'P2 member for: %e days, %k hours, %i minutes, %s seconds ago.') FROM posts WHERE user_id = ".$user_id;

    $date_of_last_post = DB::instance(DB_NAME)->SELECT_field($q);
    return htmlspecialchars($date_of_last_post);
  }


  public static function get_user_info($user_id){

    $q = "SELECT * FROM users WHERE user_id = ".$user_id;
    $user = DB::instance(DB_NAME)->SELECT_row($q);

  } 

  #from example in user controller
  public static function get_followers($user_id){

    #Build a query of the users this user is following & get their user info
    $q = "SELECT * FROM users_users WHERE user_id = ".$this->user->user_id;

    #Execute our query storing the results in a variable $connections
    $connections = DB::instance(DB_NAME)->SELECT_rows($q);

    #comma separated string of user ids to loop through
    $connections_string = "";

    foreach($connections as $connection){
            $connections_string .= $connection['user_id_followed'].",";
    }

    #Remove the final comma
    $connections_string = substr($connections_string, 0, -1);

    #Now let's build our query to grab the follower info
    $q = "SELECT * FROM users
    JOIN users USING (user_id)
    WHERE posts.user_id IN (".$connections_string.")"; 
                  
    #Run our query and store results in the variable $posts
    $followers = DB::instance(DB_NAME)->SELECT_rows($q);

  }

  #Get count of users the logged in user is following
  public static function get_count_following($user_id){

      $q = "SELECT count(user_id_followed) FROM users_users WHERE user_id = ".$this->user->user_id;
      $count_following = DB::instance(DB_NAME)->SELECT_field($q);
      return htmlspecialchars($count_following);
  }

  #Get count of followers
  public static function get_count_followed($user_id){

    $q = "SELECT count(user_id_followed) FROM users_users WHERE user_id_followed = ".$this->user->user_id;
    $count_followed = DB::instance(DB_NAME)->SELECT_field($q);
    return htmlspecialchars($count_followed);
  } 

  #Get date of last posts as string
  public static function get_posts_by_days_old($days){

    $q = "SELECT * FROM posts WHERE (to_days(now()) - to_days(FROM_unixtime(created)) < $days )";
    $count_followed = DB::instance(DB_NAME)->SELECT_field($q);
    return htmlspecialchars($count_followed);
  }
}
?>