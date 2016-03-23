<?php 

  $accessToken = cmb2_get_option('eggman_options', 'instagramaccesstoken');
  $tag = cmb2_get_option('eggman_options', 'hashtag');
  $urlLiked = 'https://api.instagram.com/v1/users/self/media/liked/?access_token='.$accessToken.'&count=12';
  $urlTag = 'https://api.instagram.com/v1/tags/'.$tag.'/media/recent?client_id=bd41ebe7f25e49eab9bf444cc316cd01&count=6';

  $cache_insta = 'cache_file_insta';

  if(file_exists($cache_insta) && filemtime($cache_insta) > time() - 60*60){
    $unique = unserialize(file_get_contents($cache_insta)); 
  } else {

    $json_data_liked = @file_get_contents($urlLiked);
    $json_data_tag = file_get_contents($urlTag);
    $jsonData_tag = json_decode($json_data_tag, true);

    if ($json_data_liked !== false) {
      $jsonData_liked = json_decode($json_data_liked, true);
      $mergedInsta = array_merge($jsonData_tag['data'],$jsonData_liked['data']);
    } else {
      $mergedInsta = $jsonData_tag['data'];
    }

    function sortByOrder($a, $b) {
      return $b['caption']['created_time'] - $a['caption']['created_time'];
    }

    usort($mergedInsta, 'sortByOrder');

    $unique = array();
    foreach ($mergedInsta as $place) {
        if (!array_key_exists($place['id'], $unique)) {
            $unique[$place['id']] = $place;
        }
    }

    if ($json_data_tag) {
        file_put_contents($cache_insta, serialize($unique));
    }

}

$i = 0;
  foreach ($unique as $key => $value) {
    if ($i == 6) { break; }
    echo "\t".'<a class="social-post instagram" title="'.htmlentities($value['caption']['text']).' '.htmlentities(date("F j, Y, g:i a", $value['caption']['created_time'])).'" href="'.$value['link'].'">
      <img src="'.$value['images']['low_resolution']['url'].'" alt="'.$value['caption']['text'].'"/>  <svg><use xlink:href="#instagram-icon"></use></svg></a>';
      $i++;
   }
?>