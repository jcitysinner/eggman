<?php

$twitteruser = "picard102";
$notweets = 4;
$consumerkey = "GYMt1XNbvyYqGtT66OaY3mAhi";
$consumersecret = "ljhrnLoaOg5c0BlVVaeDtwA3fdm5doiAQWeeUDHxHFJJJyytVD";
$accesstoken = "985621-TJkIJZA6vCPvNJ0kN1BCJ9YNQjLd0bbVJmQE3CQc7xk";
$accesstokensecret = "FRJ9mVfZcryZwXLsFUReb7rS620tFINU9uim8VoEu1GQD";
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
 
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);

$cache_tweet = 'cache_file_tweet';

if(file_exists($cache_tweet) && filemtime($cache_tweet) > time() - 60*60){
  $tweets = unserialize(file_get_contents($cache_tweet)); 
} else {

  $tweets = $connection->get('https://api.twitter.com/1.1/favorites/list.json?screen_name='.$twitteruser.'&count='.$notweets);
  if (@property_exists($tweets, 'errors')) {
    $tweets = unserialize(file_get_contents($cache_tweet)); 
  } else {
    file_put_contents($cache_tweet, serialize($tweets));
  }
}

$i = 0;
  foreach ($tweets as $key => $value) {
    if ($i == 6) { break; }
    $has = '';
    if ($value->entities->media[0]->media_url) {
      $has = 'hasmedia';
    }
echo '<div class="social-post twitter '.$has.'">';

    if ($value->entities->media[0]->media_url) {
        echo '<img class="media" src="'.$value->entities->media[0]->media_url.':thumb">';
    }

echo '
<div class="twitter-content">
<p>'.$value->text.'</p>
            
<a class="twitter-user" href="https://twitter.com/'. $value->user->screen_name.'">
  <img src="'.$value->user->profile_image_url.'" class="twitter-avatar">'.$value->user->screen_name.'
</a>
</div>
 <a class="twitter-link" href="https://twitter.com/'. $value->user->screen_name.'/status/'. $value->id.'">'.date('M jS', strtotime($value->created_at)).'  <svg><use xlink:href="#twitter-icon"></use></svg></a>
 

          </div> ';








      $i++;
   }

?>