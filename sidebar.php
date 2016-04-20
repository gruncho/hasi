<aside class="lastpost">
  <ul class="c"> 
  <h4 class="title">
	Últimas noticias
  </h4>
  <?php $the_query = new WP_Query('showposts=3'); while ($the_query->have_posts()) : $the_query->the_post();?>
        <li>    
	<div class="small_post">
          <a href="<?php the_permalink(); ?>">
            <span  class="spacepad">
              <?php the_time('j M Y'); ?>
            </span>    
  			<?php echo get_the_post_thumbnail( $post->ID, 'small-home'); ?>
  			<h3 class="spacepad">
				<?php the_title(); ?>
			</h3>
  			<p  class="spacepad">
			<?php $text = get_the_excerpt(); if(strlen($text ) > 200) {
 	        $text = substr($text , 0, 200);
 	        }
 	        echo "$text..."; ?> 
			</p>
		</a>  
		</div><!-- small_post -->
        </li>    
        <?php endwhile; ?>
   </ul>
</aside><!-- final post -->