


<h1>This is the profile of <strong><?=$user_arr['first_name']?> <?=$user_arr['last_name']?></p><br></strong></h1>

<? if(!$profile_arr ): ?>
  <div class='error'>
    There is no user profile info. Please check back later.
  </div>
<? endif; ?>



<section>
 <div class='text'>
	<p>Member for: <?=$profile_arr['membership_duration']?></p><br>
	<p>Last post: <?=$profile_arr['last_post']?></p><br>
	<p>Number of followers: <?=$profile_arr['count_followed']?></p><br>
	<p>Following <?=$profile_arr['followers']?> number of user</p><br>
	<p>Profile image path: <img src="<?=$profile_arr['image_path']?>"></p><br>


	<p>User_id: <?=$user_arr['user_id']?></p><br>
	<p>Account created: <?=$user_arr['created']?></p><br>
	<p>email address: <?=$user_arr['email']?></p><br>
	<p>User last modified:<?=$user_arr['modified']?></p><br>
	<p>First Name: <?=$user_arr['first_name']?></p><br>
	<p>Last Name: <?=$user_arr['last_name']?></p><br>
	<p>Avatar: <?=$user_arr['avatar']?></p><br>
	
 </div>
</section>

