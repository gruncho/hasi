<?php
/*
Template Name: template-1
*/
get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article>
  <h1>
    <?php the_title(); ?>
  </h1>
  <h2>
    Template 1
  </h2>
  <div class="main">
    <?php the_content("Sigue leyendo"); ?>
  </div>
  <!-- main -->
  <?php endwhile; else: ?>
    <?php include (TEMPLATEPATH . '/404.php'); ?>
  <?php endif; ?>
</article>

<?php get_footer(); ?>
