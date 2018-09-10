<?php get_header(); ?>

<section class="section category">
  <div class="category__header">
    <div class="category__content">
      <div class="category__subtitle">
        Resultados búsqueda de
      </div>
      <h1 class="category__title">
        <?php printf(get_search_query()); ?>
      </h1>
    </div>
  </div>

  <div class="category__content section">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <?php get_template_part('modules/components/post-resume'); ?>
    <?php endwhile; ?>
  </div>
</section>

<?php endif; ?>

<?php get_footer(); ?>
