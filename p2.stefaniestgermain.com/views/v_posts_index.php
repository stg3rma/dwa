<? foreach($posts as $post): ?> #could say $posts as $key => $post

	<h2><?=$post['first_name']?> <?=$post['last_name']?> posted:</h2>
	<?=$post['content']?>

	<br><br>

<? endforeach; ?>