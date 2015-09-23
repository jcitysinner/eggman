
<section class="menu-section">

<h1>Today's Menu</h1>

  <div class="menu-wrap"> 
    <div class="menu">

    <?php 
      $args=array(
        'posts_per_page'  =>  100,
        'post_type' =>  'items',
        'meta_query' => array(
          array(
              'key'     => 'items_show',
              'value'   => 'on',
              'compare' => '=',
          )
        )
      ); 

      query_posts($args);
      if (have_posts()) : while (have_posts()) : the_post(); 
      if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
        $image_id = get_post_thumbnail_id($post->ID);
        $url = wp_get_attachment_image_src($image_id,'post_card_large', true)[0];
    ?>
      <div <?php post_class('item'); ?>  id="post-<?php the_ID(); ?>" data-postid="<?php the_ID(); ?>">
        <div class="img-wrap"><img src="<?php echo $url ?>"></div>
        <h2><?php the_title(); ?></h2>
      </div>

    <?php } endwhile; endif; wp_reset_query(); ?>

    <div class="menu-arrow right">
      <svg class="arrow-right"><use xlink:href="#arrow-right"></use></svg>
    </div>

    <div class="menu-arrow left">
      <svg class="arrow-right"><use xlink:href="#arrow-left"></use></svg>
    </div>

  </div>
</div>

</section>

<div class="menu_target" style="display:none;"></div>