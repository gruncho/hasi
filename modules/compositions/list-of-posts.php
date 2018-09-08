<section class="section list-of-posts">
  <?php $the_query = new WP_Query('showposts=10'); while ($the_query->have_posts()) : $the_query->the_post();?>
    <?php get_template_part('modules/components/post-resume'); ?>
  <?php endwhile; ?>
</section>
