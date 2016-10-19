<?php get_header(); ?>

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
    <?php the_time('j M Y'); ?>
    <?php echo the_post_thumbnail('small-home'); ?>
    <?php the_title(); ?>
    <div class="main">
       <p>
        <?php $text = get_the_excerpt(); if(strlen($text ) > 200) {
            $text = substr($text , 0, 200);
        }
        echo "$text..."; ?>
    </p>
    <!-- main -->

    <?php if ( comments_open() ) comments_template(); ?>
<?php endwhile; else: ?>
    <?php include (TEMPLATEPATH . '/404.php'); ?>
<?php endif; ?>  


<nav class="navigator">
    <div class="left"><?php next_posts_link('&laquo; Atrás') ?></div>
    <div class="right"><?php previous_posts_link('Adelante &raquo;') ?></div>
</nav>

<?php get_footer(); ?>


