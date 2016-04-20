<?php get_header(); ?>	
		<h1>
			Resultados de la búsqueda
		</h1>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
       <article class="single_home">  
	      <span>
	        <?php the_time('j M Y'); ?>
	      </span>
	        <h2>
	            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
	                <?php the_title(); ?>
	            </a>
	        </h2>
	        <p>
	            <?php $text = get_the_excerpt(); if(strlen($text ) > 200) {
	                $text = substr($text , 0, 200);
	            }
	            echo "$text..."; ?>
	        </p>
	        </article>
 <?php endwhile; ?> 
 
<?php  else: ?>
<?php _e('Lo sentimos, no hay resultados con este término de búsqueda.'); ?>
<?php endif; ?>


<?php  get_sidebar()?>
<?php get_footer(); ?>
