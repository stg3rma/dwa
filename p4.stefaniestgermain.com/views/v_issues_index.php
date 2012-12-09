<? if($show_no_issues_message): ?>
Sorry there are no issues. 
<? endif; ?>

<? if($show_issues): ?>
<h1>Issues <?= $user->first_name ?> has reported:</h1>

<br><br>


<section id = "comments">
  <? foreach($issues as $post): ?>
    <article class="comment">
      <a class="comment-img" href="#non">
        <img src="" alt="" width="50" height="50">
      </a>
      <div class="comment-body">
        <div class="text">
          <p><?=$post['description']?></p>
        </div>
        <p class="attribution">by <a href='/users/profile_by_id/<?=$post['user_id'] ?>'><?=$post['first_name']?> <?=$post['last_name']?> </a> at <?= date('D M d, Y, h:ia', $post['created']) ?></p>
      </div>
    </article>
  <? endforeach; ?>
</section>


<? endif; ?>