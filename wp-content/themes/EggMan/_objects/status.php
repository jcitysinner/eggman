
<section class="status closed">
  <?php
      echo '<div class="status-icon">';
      include(get_template_directory() .'/img/svg/compressed/sun-icon.svg');
      echo '</div>';
  ?>
  <p id='status-copy'> 
     <span>Loading <div class="loading"><svg><use xlink:href="#egg-cross"></use></svg></div></span> 
  </p>

  <div class="controls">

    <a href="#" id='schedule-trigger' class='schedule-trigger'>
      <svg class="calendar-icon"><use xlink:href="#calendar-icon"></use></svg>
      <span>See Future Schedule</span>
    </a>

  </div>

</section>
