<?php 
$status = open; // Soon or Closed
?>

<section class="status <?php echo $status?>">

  <?php
    if ($status == 'open' || $status == 'soon') {
      echo '<div class="status-icon">';
      include(get_template_directory() .'/img/svg/compressed/sun-icon.svg');
      echo '</div>';
    }
  ?>

  <p><span>Now Open till 10am</span>Wilson St W &amp; Bathurst Ave N</p>

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
   
    <a href="#">
      <svg class="calendar-icon"><use xlink:href="#calendar-icon"></use></svg>
      <span>See Future Schedule</span>
    </a>

  </div>

</section>
