<h1>This is the profile of <strong><?=$user_arr['first_name']?> <?=$user_arr['last_name']?></p><br></strong></h1>

<? if(!$profile_arr ): ?>
  <div class='error'>
    There is no user profile info. Please check back later.
  </div>
<? endif; ?>

<h2>Account Information</h2>
<section id="comment-body">
 <div id="text">
	<ul>
		<li>First Name: <?=$user_arr['first_name']?></li>
		<li>Last Name: <?=$user_arr['last_name']?></li>
		<li>email address: <?=$user_arr['email']?></li>
		<li>Account created: <?=$user_arr['created']?></li>
		<li>User last modified:<?=$user_arr['modified']?></li>
	</ul>
 </div>
</section>
<br>
<br>

<h2>P2 Stats</h2>
<section id="text">
 <div id="text">
   <ul>
 	<li>Member for: <?=$profile_arr['membership_duration']?></li>
	<li>Last post: <?=$profile_arr['last_post']?></li>
	<li>Number of followers: <?=$profile_arr['count_followed']?></li>
	<li>Following <?=$profile_arr['followers']?> number of user</li>
	<li>Profile image path: <img src="<?=$profile_arr['image_path']?>"></li>
   </ul>
 <div>
</section>

