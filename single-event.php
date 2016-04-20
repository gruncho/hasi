<?php
get_header();
get_header('2');
$end_date = date('d M y',strtotime(get_field('end_date')));
$start_date = date('d M y',strtotime(get_field('start_date')));
$free = get_field('free');
$class_g = '';
if($free){$class_g = ' class="free"';};
?>

<article class="event-default c">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php $act_id = get_the_ID(); ?>
    <?php the_post_thumbnail('single-feature'); ?>
    <div class="content_event">    
    <h2 id="post-<?php the_ID(); ?>">
        <a href="<?php the_permalink() ?>" rel="bookmark">
            <?php the_title(); ?>
        </a>
    </h2>
   
    <?php $location = get_field('place_map'); if( !empty($location) ): ?>
        <div class="acf-map">
            <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
        </div>
    <?php endif; ?>

    <p>
        <?php the_category(' ') ?>
    </p>    
    
    <div class="main">
        <?php the_content("Sigue leyendo"); ?>
    </div><!-- main -->
    </div><!-- content_event -->
    <!-- main -->  
    <div class="side-event">    
      <div class="boxside">   
        <h4>
          Información
        </h4>
       <?php if(get_field('more_than_one_day')): ?>
            <p>
                <?php echo $start_date ?>
                —
                <?php echo $end_date; ?>
            </p>           
            <p>
              <?php the_field('timetable'); ?>
            </p>
        <?php else: ?>
            <p><?php echo $end_date ?></p>
        <?php endif; ?>
        </p>  
        <p class="precionumb">
        <?php if($free): ?>
            Gratis
        <?php else: ?>
           <?php the_field('price'); ?>€ 
        </p><!-- precionumb -->
      </div><!--boxside -->
      <div class="formevents">           
        <a class="suscribe" target="_blank" href="http://eepurl.com/Q-yYP">
          Inscribirse online
        </a>     
        <p>
          Si quieres más información sobre nuestros laboratorios puedes pedirla directamente también en nuestra sección de <a href="<?php bloginfo('url'); ?>/contacto">contacto</a>
        </p>
      </div><!-- form events -->
    <?php endif; ?>
    </div><!-- side-event -->
</article>

    <!-- morepost -->

<?php endwhile; else: ?>
    <?php include (TEMPLATEPATH . '/404.php'); ?>
<?php endif; ?>

<?php get_footer(); ?>
