<?

class Helper {

  public static function get_open_issues_by_zipid($zipid){

      $q = "SELECT count(issue_id) FROM issues WHERE zipcode_id = $zipid and active = 1";
      $open_issues_by_zipid = DB::instance(DB_NAME)->SELECT_field($q);
      return htmlspecialchars($open_issues_by_zipid);
  }

  #issues old & new totals
  public static function get_active_issues(){

      $q = "SELECT count(issue_id) FROM issues WHERE active = 1";
      $active_issues = DB::instance(DB_NAME)->SELECT_field($q);
      return htmlspecialchars($active_issues);
  }

  public static function get_closed_issues(){

      $q = "SELECT count(issue_id) FROM issues WHERE active = 0 ";
      $closed_issues = DB::instance(DB_NAME)->SELECT_field($q);
      return htmlspecialchars($closed_issues);

  }

  public static function get_all_issues(){

      $q = "SELECT count(issue_id) FROM issues";
      $all_issues = DB::instance(DB_NAME)->SELECT_field($q);
      return htmlspecialchars($all_issues);

  }

  #active issues by type
  public static function get_open_issues_by_catid($catid){

      $q = "SELECT count(category_id) FROM issues WHERE category_id = $catid and active = 1";
      $open_issues_by_catid = DB::instance(DB_NAME)->SELECT_field($q);
      return htmlspecialchars($open_issues_by_catid);
  }

  #Get user's name
  public static function get_name($user_id){

      $q = "SELECT first_name, last_name 
      FROM users
      WHERE user_id =".$user_id;

      #Run our query and store results in the variable $issues
      $fullname = DB::instance(DB_NAME)->SELECT_row($q);

      return $fullname;
  }

  #Get issues
  public static function get_issues($user_id){

      $q = "SELECT * FROM issues
          WHERE user_id = $user_id ORDER BY issues.created DESC";

      #Run our query and store results in the variable $issues
      $issues = DB::instance(DB_NAME)->select_rows($q);
      return $issues;
  }

  
  #Get membership length as string 
  public static function get_user_membership_length($user_id){

      $q = "SELECT date_format(FROM_unixtime(unix_timestamp(now()) - created),
      'P4  member for: %e days, %k hours, %i minutes, %s seconds ago.') FROM users WHERE user_id = ".$user_id;
      
      $user_membership_length = DB::instance(DB_NAME)->SELECT_field($q);
      return htmlspecialchars($user_membership_length);
  }

 
  # Get date of last post as string
  public static function get_date_of_last_issue($user_id){

    #max created for most recent issue creation
    $q = "SELECT date_format(FROM_unixtime(unix_timestamp(now()) - max(created)),
    'Last issue: %e days, %k hours, %i minutes, %s seconds ago.') FROM issues WHERE user_id = ".$user_id;

    $date_of_last_issue = DB::instance(DB_NAME)->SELECT_field($q);
    return htmlspecialchars($date_of_last_issue);
  }


  public static function get_user_info($user_id){

    $q = "SELECT * FROM users WHERE user_id = ".$user_id;
    $user_info = DB::instance(DB_NAME)->SELECT_row($q);
    return $user_info;
  } 

  
  #Get count of admins in the system
  public static function get_users_count(){

      $q = "SELECT count(user_id) FROM users WHERE role = 'admin'";
      $user_count = DB::instance(DB_NAME)->SELECT_field($q);
      return htmlspecialchars($count_following);
  }

  #Get count of usersin the system
  public static function get_admin_count(){

      $q = "SELECT count(user_id) FROM users WHERE role = 'user'";
      $user_count = DB::instance(DB_NAME)->SELECT_field($q);
      return htmlspecialchars($count_following);
  }

  #Get count of issues
  public static function get_count_issues($user_id){

    $q = "SELECT count(issues_id) FROM issues WHERE user_id = ".$user_id;
    $issues_count = DB::instance(DB_NAME)->SELECT_field($q);
    return htmlspecialchars($issues_count);
  } 

  #Get date of last issues as string
  public static function get_issues_by_days_old($days){

    $q = "SELECT * FROM issue WHERE (to_days(now()) - to_days(FROM_unixtime(created))) < $days )";
    $count_followed = DB::instance(DB_NAME)->SELECT_field($q);
    return htmlspecialchars($count_followed);
  }

 


}
?>
