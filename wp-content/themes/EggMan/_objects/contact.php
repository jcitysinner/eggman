<section class="contact">
	<div class="wrapper">
	
	<div class="col_1">	
		<h1>Contact</h1>
	</div>

	<div class="cols">
		<span>
			<h2>Catering</h2>
			<a href="">email@email.com</a>
		</span>
		<span>
			<h2>General</h2>
			<a href="">general@genral.com</a>
		</span>
		<span>
			<h2>Social</h2>
			  <?php
          if (!empty($twitter)) {
            echo '<a href="'.$twitter.'"><svg><use xlink:href="#twitter-icon"></use></svg> Twitter</a>';
          }
          if (!empty($facebook)) {
            echo '<a href="'.$facebook.'"><svg><use xlink:href="#facebook-icon"></use></svg> Facebook</a>';
          }
          if (!empty($instagram)) {
            echo '<a href="'.$instagram.'"><svg><use xlink:href="#instagram-icon"></use></svg> Instagram</a>';
          }
        ?>
		</span>
	</div><!-- cols -->

	</div>
</section>