<?php

$twitter =  cmb2_get_option('eggman_options', 'twitter');
$facebook =  cmb2_get_option('eggman_options', 'facebook');
$instagram =  cmb2_get_option('eggman_options', 'instagram');
$hashtag =  cmb2_get_option('eggman_options', 'hashtag');

?>

<section class='social'>
  <div class='wrapper'>

<div class="twitter-wrapper">
<?php include( "social_twitter.php"); ?>
</div>

<div class="instagram-wrapper">
  <?php include( "social_insta.php"); ?>
</div>

<div class="twitter-wrapper post">
</div>

  </div>

  <div class="share">
    <div class="wrapper"> 
      <?php if (!empty($hashtag)) { echo '<span class="hashtag">#'.$hashtag.'</span>'; } ?>
      <div class="accounts">
        <span>Follow the EggMan</span>
        <?php
          if (!empty($twitter)) {
            echo '<a href="https://twitter.com/'.$twitter.'"><svg><use xlink:href="#twitter-icon"></use></svg></a>'; 
          }
          if (!empty($facebook)) {
            echo '<a href="https://www.facebook.com/'.$facebook.'"><svg><use xlink:href="#facebook-icon"></use></svg></a>';
          }
          if (!empty($instagram)) {
            echo '<a href="https://www.instagram.com/'.$instagram.'"><svg><use xlink:href="#instagram-icon"></use></svg></a>';
          }
        ?>
    </div>
  </div>

</section>