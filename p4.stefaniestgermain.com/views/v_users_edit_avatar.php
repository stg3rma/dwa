h1>Edit your profile image</h1>

<form method="POST" action="/users/p_edit_avatar" enctype="multipart/form-data">

	<?=$form->hidden('user_id'); ?>
	<input type="file" name="image" ><br>
		<? if(@$_GET['error']): ?>
			<span style='color:red'><?=$_GET['error']?></span><br>
		<? endif; ?>
		<br><br>
		<button id='save-button' class='submit medium'>Upload</button>
		<br><br>
		<!-- Preview thumbnail -->
		<img id='avatar' src='<?=$user->avatar_small?>'>
		<br>
</form>