<form method='POST' action='/posts/p_add'>

	<strong>New Post:</strong><br>
	<textarea name='content'></textarea>
	<br><br>
	
<!-- 	Category<br>
	<input select='text' name='category_id'>
	<br><br>

	Private<br>
	<input type='radio' name='private' value='1'>
	<br><br> -->
	
	<? if($error): ?>
		<div class ='error'>
			Please enter text for your New Post.
		</div>
		<br>
	<? endif; ?>
	
	<input type='submit' value='Submit'>
	
</form>
<br><br>

<? if(!$posts ): ?>
  <div class='error'>
    There are no recent posts to display.
  </div>
<? endif; ?>

<h1>What <strong><?=$fullname['first_name'] ?> <?=$fullname['last_name'] ?></strong> is saying:</h1>
<br><br>
<section id = "comments">
  <? foreach($posts as $post): ?>
    <article class="comment">
      <a class="comment-img" href="#non">
        <img src="/images/placeholder.png" alt="" width="50" height="50">
      </a>
      <div class="comment-body">
        <div class="text">
          <p><?=$post['content']?></p>
        </div>
        <p class="attribution">posted at <?= date('D M d, Y, h:ia', $post['created']) ?></p>
      </div>
    </article>
  <? endforeach; ?>
</section>