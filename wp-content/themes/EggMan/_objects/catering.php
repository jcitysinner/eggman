
<section class="catering">

  <div class="wrapper">
    <div class="content-column">
      <h1>We Cater</h1>
      <p>The Eggman right outside your door, your office or your venue.</p>
      <a href='#' id='contact-open-trigger' class="red pill">Contact Us</a>
    </div>

    
      
    <?php 
      $args=array(
        'posts_per_page'  =>  1,
        'orderby' => rand,
        'post_type' =>  'testimonials',
      ); 

      query_posts($args);
      if (have_posts()) : while (have_posts()) : the_post(); 

      if (has_post_thumbnail()) { 
        $image_id = get_post_thumbnail_id($post->ID);
        $testimonialurl = wp_get_attachment_image_src($image_id,'post_card_large', true)[0];
        $hasimg = 'hasimg';
        $imgstring = '<div class="img-wrap"><img src="'.$testimonialurl.'"></div>';
      }
    ?>
      <div class="testimonial-column <?php echo $hasimg; ?>">
        
        <?php echo $imgstring; ?>
        
        <?php the_content(); ?>
        <span>- <?php the_title(); ?></span>
      </div>

    <?php endwhile; endif; wp_reset_query(); ?>

  </div>
</section>
<div class='contact-form-wrap'>
  <div class='contact-form wrapper'>
    <span id='contact-close' class='contact-close'>Close</span>
    <?php echo do_shortcode( '[contact-form-7 id="37" title="Contact form 1"]' ); ?>
  </div>
</div> 