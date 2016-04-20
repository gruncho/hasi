<?php get_header(); ?>
<div class="destacado page_original">
	<div class="content_destacado">
	</div>
</div><!-- fin destacado -->
<div class="page_section singlepost resultssearch">
	<aside class="sidebar">

		<div class="cajita">
			<h5>
				¿necesitas más información?
			</h5>			
			<div class="textwidget">
				Si no encuentras los resultados que buscas, puedes hacerlo escribiéndonos a <b>info@idbrasil.com.br</b>
			</div>
		</div>
	</aside>	
		<h4 class="titleresults">
			Resultados de la búsqueda
		</h4>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
       <article class="single_home">  
	      <span>
	        <?php the_time('j M Y'); ?>
	      </span>
	        <div class="content_post">
	        <h3>
	            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
	                <?php the_title(); ?>
	            </a>
	        </h3>
	        <p>
	            <?php $text = get_the_excerpt(); if(strlen($text ) > 200) {
	                $text = substr($text , 0, 200);
	            }
	            echo "$text..."; ?>
	        </p>
	        </div><!-- content_post -->
	        </article>
 <?php endwhile; ?> 
</div><!-- c -->     

</div><!-- index -->
    </div><!-- c -->
 <div class="c nav">
 	<div class="left"><?php next_posts_link('&laquo; Atrás') ?></div>
 	<div class="right"><?php previous_posts_link('Adelante &raquo;') ?></div>
 </div><!-- nav -->



 
<?php  else: ?>
<?php _e('Lo sentimos, no hay resultados con este término de búsqueda.'); ?>
<?php endif; ?>

 </div> <!-- Fin de wrapper. De nuevo ten en cuenta la estructura  tu plantilla-->

<?php  get_sidebar()?>
<?php get_footer(); ?>
