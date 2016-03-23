<?php 
$general =  cmb2_get_option('eggman_options', 'general');
$catering =  cmb2_get_option('eggman_options', 'catering');
?>

<section class="contact">
	<div class="wrapper">
	
	<div class="col_1">	
		<h1>Contact</h1>
	</div>

	<div class="cols">
		<span>
			<h2>Catering</h2>
			<?php if (!empty($catering)) {
            echo '<a href="mailto:'.$catering.'">'.$catering.'</a>';
          	}?>
		</span>
		<span>
			<h2>General</h2>
			<?php if (!empty($general)) {
            echo '<a href="mailto:'.$general.'">'.$general.'</a>';
          	}?>
		</span>
		<span>
			<h2>Social</h2>
			  <?php
          if (!empty($twitter)) {
            echo '<a href="https://twitter.com/'.$twitter.'"><svg><use xlink:href="#twitter-icon"></use></svg> Twitter</a>';
          }
          if (!empty($facebook)) {
            echo '<a href="https://www.facebook.com/'.$facebook.'"><svg><use xlink:href="#facebook-icon"></use></svg> Facebook</a>';
          }
          if (!empty($instagram)) {
            echo '<a href="https://www.instagram.com/'.$instagram.'"><svg><use xlink:href="#instagram-icon"></use></svg> Instagram</a>';
          }
        ?>
		</span>
	</div><!-- cols -->

	</div>
</section>

