<? if($show_no_follower_message): ?>
You need to follow someone to see a feed! 
Find friends to follow <a href="/posts/users">here</a>
<? endif; ?>
<? if(!$show_no_follower_message && $show_no_posts_message): ?>
The users you are following have not posted anything yet.
Stay tuned!</a>
<? endif; ?>
<? if($posts): ?>
<div>
<h1>Posts from users <?= $user->first_name ?> is following:</h1>
<br><br>

<? echo Debug::dump($posts, "as POSTS!!!!!!!!!!"); ?>

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
        <p class="attribution">by <a href='/users/profile_by_id/<?=$post['user_id'] ?>'><?=$post['first_name']?> <?=$post['last_name']?> </a> at <?= date('D M d, Y, h:ia', $post['created']) ?></p>
      </div>
    </article>
  <? endforeach; ?>
</section>
</div>
<? endif; ?>
