<?php get_header();

  if (have_posts()) : while (have_posts()) : the_post(); 

    $price_lrg = get_post_meta( $post->ID, 'items_price_lrg', 'true' ); 
    $price_reg = get_post_meta( $post->ID, 'items_price_reg', 'true' ); 

    $based = get_post_meta( $post->ID, 'items_base', 'true' ); 
		$sodium = get_post_meta( $post->ID, 'items_sodium', 'true' );
		$fat = get_post_meta( $post->ID, 'items_fat', 'true' );
		$carb = get_post_meta( $post->ID, 'items_carb', 'true' );
		$cal = get_post_meta( $post->ID, 'items_cal', 'true' );
		$money = get_post_meta( $post->ID, 'items_money', 'true' );
		$sub = get_post_meta( $post->ID, 'items_sub', 'true' );

		if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
        $image_id = get_post_thumbnail_id($post->ID);
        $url = wp_get_attachment_image_src($image_id,'post_card_large', true)[0]; }
    
?>

<article class="item_single">

	<div class="close">
	<svg><use xlink:href="#icon-close"></use></svg>
	</div>

	<div class="money_shot" style="background-image:url('<?php echo $money; ?>');"></div>

	<div class="wrapper">

		<div class="col_2">
			<div class="img-wrap"><img src="<?php echo $url ?>"></div>
		</div>

		<div class="col_1">
			<h1><?php the_title();?></h1>
			<h2><?php echo $sub; ?></h2>
			<div class="content">
				<?php the_content();?>
			</div>

			<?php 
				if(!empty($price_lrg) && !empty($price_reg)){
					echo '<div class="price"> 
					<span><small>Large:</small> <strong>$'.$price_lrg.'</strong></span> 
					<span><small>Small:</small> <strong>$'.$price_reg.'</strong></span> 
					</div>';
				} else {
					echo '<div class="price"> 
					<span><small>Price:</small> <strong>'.$price_lrg.$price_reg.'</strong></span> 
					</div>';
				}
			?>

				<h3>Nutritional Information</h3>
		<?php 
			if(!empty($based)){
				echo '<div class="serving"> <small>Serving Size:</small> <strong>'.$based.'</strong> </div>';
			}

			echo '<div class="table">';

			if(!empty($cal)){
				echo '<div class="cell"> <strong>'.$cal.'</strong> <small>Calories</small></div>';
			}

			if(!empty($carb)){
				echo '<div class="cell"> <strong>'.$carb.'</strong>  <small>Carbs (g)</small> </div>';
			}

			if(!empty($fat)){
				echo '<div class="cell"> <strong>'.$fat.'</strong> <small>Total Fat (g)</small> </div>';
			}

			if(!empty($sodium)){
				echo '<div class="cell"> <strong>'.$sodium.'</strong> <small>Sodium (mg)</small> </div>';
			}
			
			echo '</div>';
		?>
		</div>



	</div>
</article>



<?php	endwhile; endif; ?>

<?php get_footer(); ?>