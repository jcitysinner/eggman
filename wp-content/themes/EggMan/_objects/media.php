<section class='press'>
  <div class='wrapper'>

    <ul>
      <li>
        <span>
            <strong>The <i>EggMan</i> is making waves!</strong> 
        </span>
      </li>

    <?php 
      $count_posts = wp_count_posts('press');
      if ($count_posts->publish <= 6) {
        $display = 6;
      } else { $display = 5; }

      $args=array(
        'posts_per_page'  =>  $display,
        'post_type' =>  'press',
      ); 
      query_posts($args);
      if (have_posts()) : while (have_posts()) : the_post(); 

      $article_url = get_post_meta( $post->ID, 'press_url', 'true' ); 
      $article_source = get_post_meta( $post->ID, 'press_source', 'true' ); 

      if (has_post_thumbnail()) { 
        $image_id = get_post_thumbnail_id($post->ID);
        $pressurl = wp_get_attachment_image_src($image_id,'post_card_large', true)[0];
        $hasimg = 'hasimg';
        $imgstring = '<div class="img-wrap"><img src="'.$pressurl.'"></div>';
      }
    ?>

    <li> 
      <span>        
      <h2><a href="<?php echo $article_url; ?>"><?php the_title(); ?> <svg><use xlink:href="#external"></use></svg></a></h2>
      <?php echo $article_source; ?>
      </span>
    </li>

    <?php endwhile; endif; wp_reset_query();
      if ($count_posts->publish >= 7) {
        echo '<li class="last"><div class="lmore">Load More</div></li>';
      } 
    ?>
    </ul>
  </div>
</section>