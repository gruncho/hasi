<div class="moresingle">
  <?php the_post_thumbnail('small-home'); ?>
  <h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
    <p><?php echo myTruncate(get_the_excerpt(),50); ?></p>
</div><!-- moresingle -->