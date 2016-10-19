<?php // Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
		?>

		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>

		<?php
		return;
	}
}

/* This variable is for alternating comment background */
$oddcomment = 'class="alt" ';
?>

<!-- You can start editing here. -->
<?php if ($comments) : ?>
	<h3 id="comments"><?php comments_number('Sin comentarios', '1  comentario', '% comentarios' );?></h3>

	<ol id="comments" class="commentslist">

		<?php foreach ($comments as $comment) : ?>

			<li id="comment-<?php comment_ID() ?>" <?php if ($comment % 2) echo "$oddcomment"; ?>>
				<span class="gravatar"><?php echo get_avatar( $comment, 50 ); ?></span>
				<?php comment_text() ?>
				<p class="meta"><?php comment_author_link() ?> <?php the_time('j/m/Y'); ?>
					@ <a href="#comment-<?php comment_ID() ?>"><?php comment_time() ?></a>
					<span><?php echo $i; ?></span>
					<?php edit_comment_link(__("Edit This"), ' | '); ?></p>
				</li><br /><br />

				<?php
				/* Changes every other comment to a different class */
				$oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : '';
				?>

			<?php endforeach; /* end for each comment */ ?>

		</ol>

	<?php else : // this is displayed if there are no comments so far ?>

		<?php if ('open' == $post->comment_status) : ?>
			<!-- If comments are open, but there are no comments. -->
			

		<?php else : // comments are closed ?>
			<!-- If comments are closed. -->
			<p class="nocomments"><font color="red">comentarios cerrados</font></p>

		<?php endif; ?>
	<?php endif; ?>


	<?php if ('open' == $post->comment_status) : ?>
		
		<div class="formucomments">
			<h3 id="respond">Comentarios</h3>

			<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
				<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
			<?php else : ?>

				<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" style="text-align:justify">

					<?php if ( $user_ID ) : ?>

						<p style="text-align:justify;">Hola <b><?php echo $user_identity; ?></b>, andas conectado @ <a href="<?php echo wp_logout_url(); ?>" title="Log out of this account">SALIR &raquo;</a></p>

					<?php else : ?>


						<input class="fil"  onfocus="this.value='';this.style.color='#333';" value="Nombre" type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />

						<input class="fil"  onfocus="this.value='';this.style.color='#333';" value="E-Mail"  type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />

						<input class="fil" onfocus="this.value='';this.style.color='#333';" value="URL (si tienes)"  type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />

						<p class="reservamos">Si es la primera vez que publicas desde éste ordenador tu comentario será moderado</p>
					<?php endif; ?>

					<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->
					<p><textarea name="comment" id="comment" cols="70%" rows="10" tabindex="4"></textarea></p>

					<p align="left"><input class="but" name="submit" type="submit" id="submit" tabindex="5" value="publicar comentario" /></p>
					<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />

					<?php do_action('comment_form', $post->ID); ?>

				</form>
			</div><!-- formucomments -->
		<?php endif; ?>

	<?php endif; ?>
