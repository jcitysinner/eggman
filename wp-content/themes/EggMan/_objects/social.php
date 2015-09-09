<?php

$twitter =  cmb2_get_option('eggman_options', 'twitter');
$facebook =  cmb2_get_option('eggman_options', 'facebook');
$instagram =  cmb2_get_option('eggman_options', 'instagram');
$hashtag =  cmb2_get_option('eggman_options', 'hashtag');

?>
  <div class='social-section'>
    <div class='wrapper'>
      <div class='instagram-post social'>
        <img class='' src="http://placehold.it/300x300">
      </div>
      <div class='twitter-post social'>
        <img src="http://placehold.it/300x300">
        <p>Not joking when I say @TheEggmanCanada was the BEST meal we had while visiting Toronto.</p>
        <svg class='twitter-icon'><use xlink:href="#twitter-icon"></use></svg>
      </div>
      <div class='instagram-post social'>
        <img class='' src="http://placehold.it/300x300">
      </div>
      <div class='instagram-post social'>
        <img class='' src="http://placehold.it/300x300">
      </div>
      <div class='instagram-post social'>
        <img class='' src="http://placehold.it/300x300">
      </div>
    </div>
  </div>

  <div class="share">
    <div class="wrapper"> 
      <?php if (!empty($hashtag)) { echo '<span class="hashtag">#'.$hashtag.'</span>'; } ?>
      <div class="accounts">
          <span>Follow the EggMan</span>
          <?php
            if (!empty($twitter)) {
              echo '<a href="'.$twitter.'"><svg><use xlink:href="#twitter-icon"></use></svg></a>';
            }
            if (!empty($facebook)) {
              echo '<a href="'.$facebook.'"><svg><use xlink:href="#facebook-icon"></use></svg></a>';
            }
            if (!empty($instagram)) {
              echo '<a href="'.$instagram.'"><svg><use xlink:href="#instagram-icon"></use></svg></a>';
            }
          ?>
      </div>
    </div>
  </div>