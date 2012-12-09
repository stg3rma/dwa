<?

class Helper {


  #Get user's name
  public static function get_name($user_id){

      $q = "SELECT first_name, last_name 
      FROM p4_users
      WHERE user_id =".$user_id;

      #Run our query and store results in the variable $posts
      $fullname = DB::instance(DB_NAME)->SELECT_row($q);

      return $fullname;
  }

  #Get issues
  public static function get_issues($user_id){

      $q = "SELECT * FROM p4_issues
      WHERE user_id = $user_id ORDER BY posts.created DESC";

      #Run our query and store results in the variable $posts
      $posts = DB::instance(DB_NAME)->select_rows($q);
      return $issues;
  }

  
  #Get membership length as string 
  public static function get_user_membership_length($user_id){

      $q = "SELECT date_format(FROM_unixtime(unix_timestamp(now()) - created),
      'P2 member for: %e days, %k hours, %i minutes, %s seconds ago.') FROM p4_users WHERE user_id = ".$user_id;
      
      $user_membership_length = DB::instance(DB_NAME)->SELECT_field($q);
      return htmlspecialchars($user_membership_length);
  }

 
  # Get date of last post as string
  public static function get_date_of_last_issue($user_id){

    #max created for most recent issue creation
    $q = "SELECT date_format(FROM_unixtime(unix_timestamp(now()) - max(created)),
    'Last post: %e days, %k hours, %i minutes, %s seconds ago.') FROM p4_issues WHERE user_id = ".$user_id;

    $date_of_last_issue = DB::instance(DB_NAME)->SELECT_field($q);
    return htmlspecialchars($date_of_last_issue);
  }


  public static function get_user_info($user_id){

    $q = "SELECT * FROM p4_users WHERE user_id = ".$user_id;
    $user_info = DB::instance(DB_NAME)->SELECT_row($q);
    return $user_info;
  } 

  
  #Get count of admins in the system
  public static function get_users_count(){

      $q = "SELECT count(user_id) FROM p4_users WHERE role = 'admin'";
      $user_count = DB::instance(DB_NAME)->SELECT_field($q);
      return htmlspecialchars($count_following);
  }

  #Get count of issues
  public static function get_count_issues($user_id){

    $q = "SELECT count(issues_id) FROM p4_issues WHERE user_id = ".$user_id;
    $issues_count = DB::instance(DB_NAME)->SELECT_field($q);
    return htmlspecialchars($issues_count);
  } 

  #Get date of last issues as string
  public static function get_issues_by_days_old($days){

    $q = "SELECT * FROM p4_issue WHERE (to_days(now()) - to_days(FROM_unixtime(created))) < $days )";
    $count_followed = DB::instance(DB_NAME)->SELECT_field($q);
    return htmlspecialchars($count_followed);
  }

}
?>