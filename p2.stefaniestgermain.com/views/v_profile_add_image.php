<h1>upload your profile picture</h1>

<? if(@$_GET['error']): ?>
<span class="error"><?=$_GET['error']?></span><br>
<? endif; ?>

<? if(@$_GET['alert']): ?>
<span class="alert"><?=$_GET['alert']?></span><br>
<? endif; ?>

<form method='POST' action='/profile/p_add_image/' enctype="multipart/form-data">
	<strong>Choose image for profile picture :</strong><br>
	<label for="file">Filename:</label>
	<input type="file" name="imagename" />
	<br />
	<input type="submit" name="submit" value="Submit" />
</form>




	
