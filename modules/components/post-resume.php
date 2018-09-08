<article class="post-resume">
  <div class="post-resume__thumb">
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="article-list__link">
      <picture class="post-resume__picture picture">
        <?php the_post_thumbnail('medium', array( 'class' => 'no-lazy' )); ?>
      </picture>
    </a>
  </div>
  <div class="post-resume__content">
    <div class="post-resume__category">
      <?php get_template_part('modules/atoms/category-link'); ?>
    </div>
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="post-resume__link">
      <h2 class="post-resume__title">
          <?php the_title(); ?>
      </h2>
      <p class="post-resume__paragraph">
        <?php $text = get_the_excerpt(); if(strlen($text ) > 200) {$text = substr($text , 0, 250);} echo "$text"; ?>...
      </p>
    </a>
  </div>
</article>