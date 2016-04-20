<?php get_header(); ?>
<div class="destacado">
	<div class="content_destacado">
	</div>
</div><!-- fin destacado -->

<div class="page_section singlepost">
	<?php get_sidebar('2')?>
    <?php if (is_home()): ?>
    <?php endif; ?>
    <?php if (is_category()): ?>
        <?php $category = get_category(get_query_var('cat')) ?>

        <p>
            Estás en:
            <?php echo  $category -> name; ?>
        </p>

    <?php endif; ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article>  
      <p>
        <?php the_time('j M Y'); ?>
      </p>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php echo the_post_thumbnail('small-home'); ?>
            </a>
        <!-- thumb -->
        <h2>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
        <div class="main">
			<p>
            <?php $text = get_the_excerpt(); if(strlen($text ) > 200) {
                $text = substr($text , 0, 200);
            }
            echo "$text..."; ?>
        </p>
		</div><!-- main -->
        </article>
        <?php if ( comments_open() ) comments_template(); ?>
    <?php endwhile; else: ?>
        <?php include (TEMPLATEPATH . '/404.php'); ?>
    <?php endif; ?>  

</div><!-- home -->
                         
<nav class="navigator">
    <div class="left"><?php next_posts_link('&laquo; Atrás') ?></div>
    <div class="right"><?php previous_posts_link('Adelante &raquo;') ?></div>
</nav>

<!-- navigator -->

<?php get_footer(); ?>


