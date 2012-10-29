  
  public static function users()
  {
    $sql = "select user_id, first_name, last_name from users order by last_name asc, first_name asc";
    $users = DB::instance(DB_NAME)->select_rows($sql, "object");
    return $users;
  }

  public static function user_exists($user_id)
  {
    $sql = sprintf("select count(1) from users where user_id=%d", $user_id);
    $result = DB::instance(DB_NAME)->select_field($sql);
    return($result > 0);
  }

  public static function full_name($user)
  {
    return htmlspecialchars($user->first_name . " " . $user->last_name);
  }

  public static function public_user_info_for($user_id)
  {
    # profile information
    $sql = sprintf("select user_id, first_name, last_name from users where user_id=%d", $user_id);
    $result = DB::instance(DB_NAME)->select_row($sql, "object");

    # most recent post
    $sql = sprintf("select * from posts where user_id=%d order by created desc limit 1", $user_id);
    $post = DB::instance(DB_NAME)->select_row($sql, "object");
    $result->most_recent_post = $post;

    # number of followers
    $sql = sprintf("select count(1) from users_followers where user_id=%d", $user_id);
    $result->nfollowers = DB::instance(DB_NAME)->select_field($sql);

    return($result);
  }

  # all followers of $user_id
  public static function followers($user_id)
  {
    # why this language can't deal with whitespace before the END_SQL is a mystery
    $sql = <<<END_SQL
select distinct users.user_id, users.first_name, users.last_name
from users_followers uf
inner join users on users.user_id=uf.follower_id
where uf.user_id=$user_id
order by users.last_name asc, users.first_name asc
END_SQL;
    $users = DB::instance(DB_NAME)->select_rows($sql, "object");
    return($users);
  }

  # all users being followed by $user_id
  public static function following($user_id)
  {
    $sql = <<<END_SQL
select distinct users.user_id, users.first_name, users.last_name
from users_followers uf
inner join users on users.user_id=uf.user_id
where uf.follower_id=$user_id
order by users.last_name asc, users.first_name asc
END_SQL;
    $users = DB::instance(DB_NAME)->select_rows($sql, "object");
    return($users);
  }

}