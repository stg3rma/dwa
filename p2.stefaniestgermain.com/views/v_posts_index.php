<h1>Posts from users I am following:</h1>
<br><br>

<? if(!$posts ): ?>
  <div class='error'>
    There have been no posts. Please check back later.
  </div>
<? endif; ?>

<section id = "comments">
  <? foreach($posts as $post): ?>
    <article class="comment">
      <a class="comment-img" href="#non">
        <img src="/images/placeholder.jpg" alt="" width="50" height="50">
      </a>
      <div class="comment-body">
        <div class="text">
          <p><?=$post['content']?></p>
        </div>
        <p class="attribution">by <a href='/users/profile_by_id/<?=$post['user_id'] ?>'><?=$post['first_name']?> <?=$post['last_name']?> </a> at <?= date('D M d, Y, h:ia', $post['created']) ?></p>
      </div>
    </article>
  <? endforeach; ?>
</section>


