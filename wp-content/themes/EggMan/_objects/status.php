<?php 
$status = closed; // Soon or Closed
?>

<section class="status closed">

  <?php
    if ($status == 'open' || $status == 'soon') {
      echo '<div class="status-icon">';
      include(get_template_directory() .'/img/svg/compressed/sun-icon.svg');
      echo '</div>';
    }
  ?>

  <p id='status-copy'><span>OPEN</span>MORE TEXT</p>

  <div class="controls">

    <?php
      if ($status == 'open' || $status == 'soon') {
        echo '
        <a href="#">
          <svg><use xlink:href="#maps-icon"></use></svg>
          <span>View on Google Maps</span>
        </a>';
      }
    ?>
   
    <a href="#" id='schedule-trigger' class='schedule-trigger'>
      <svg class="calendar-icon"><use xlink:href="#calendar-icon"></use></svg>
      <span>See Future Schedule</span>
    </a>

  </div>

</section>
