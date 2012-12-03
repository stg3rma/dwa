


<h1>This is the profile of <strong><?=$user_arr['first_name']?> <?=$user_arr['last_name']?></p><br></strong></h1>
<div>
	<a class="button-link" href='/users/edit'>Edit Profile</a><br>
	<a class="button-link" href='/profile/add_image'>Add Profile Picture</a><br>
</div>
<? if(!$profile_arr ): ?>
  <div class='error'>
    There is no user profile info. Please check back later.
  </div>
<? endif; ?>
<br>
	<p>
	<? $file = "http://".DB_HOST."/uploads/avatars/".$image_arr['imagename'];?>
	<img src="<?= $file ?>" />
	</p>
<br>
<section>
 <div class="comment-body">
 	<div class="text">	
 	<ul>
		<li>First Name: <?=$user_arr['first_name']?></li>
		<li>Last Name: <?=$user_arr['last_name']?></li>
		<li>email address: <?=$user_arr['email']?></li>
		<li>User last modified: <?= $user_arr['modified']?></li>
		<li>Avatar: <?=$user_arr['avatar']?></li>
	</ul>
	<div>
 </div>
</section>
<br>
<br>
<h2><strong>P2 Stats</strong></h2
<section>
  <div class="comment-body">
  	<div class="text">
  	<ul>
		<li>Member for: <?=$profile_arr['membership_duration']?></li>
		<li>Last post: <?=$profile_arr['last_post']?></li>
		<li>Number of followers: <?=$profile_arr['count_followed']?></li>
		<li>Following <?=$profile_arr['followers']?> number of user</li>
		<li>Image path: <?=$profile_arr['image_path']?></li>
		<li>User_id: <?=$user_arr['user_id']?></li>
		<li>Account created: <?=$user_arr['created']?></li>
	</ul>
	</div
	</div>
</section>
