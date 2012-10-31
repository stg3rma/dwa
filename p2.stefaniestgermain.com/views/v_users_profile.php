<h1>This is the profile of <strong><?=$user->first_name?></strong></h1>

<? if(!$profile_arr ): ?>
  <div class='error'>
    There is no user profile info. Please check back later.
  </div>
<? endif; ?>

<section>
 <div class='text'>
	<p><?=$profile_arr['membership_duration']?></p><br>
	<p><?=$profile_arr['last_post']?></p>
 </div>
</section>
