<h1>This is the profile of <strong><?=$user->first_name?></strong></h1>

<? if(!$profile_arr ): ?>
  <div class='error'>
    There is no user profile info. Please check back later.
  </div>
<? endif; ?>

<section>
 <div class='text'>
	<p><?=$profile_arr['membership_duration']?></p><br>
	<p><?=$profile_arr['last_post']?></p><br>
	<p><?=$profile_arr['user_info']?></p><br>
	<p><?=$profile_arr['count_followed']?></p><br>
	<p><?=$profile_arr['followers']?></p><br>
	<p><?=$profile_arr['image_path']?></p><br>

 </div>
</section>

