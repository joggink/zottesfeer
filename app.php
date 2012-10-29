<?php

$tempdata = array();
$data = array();

$cache = unserialize(file_get_contents('./cache.php'));

if (!is_array($cache)) {
    $cache = array(
        'data' => array(),
        'last_id' => array(),
    );
} else {
    $data = $cache['data'];
}

$json = array(
    "twitter" => "http://search.twitter.com/search.json?q=zottesfeer",
    "instagram" => "https://api.instagram.com/v1/tags/zottesfeer/media/recent?client_id=8055d947e80c46e99ff0f8556a6bdbb3",
    // "youtube" => "http://gdata.youtube.com/feeds/base/videos?q=zotte+sfeer&alt=json&client=ytapi-youtube-search&v=2"
    // "flickr" => "http://api.flickr.com/services/feeds/photos_public.gne?text=zotte%2Bsfeer&format=json"
);

$last_ids = array();
foreach ($json as $type => $url) {
    if (!array_key_exists($type, $cache['last_id'])) {
        $cache['last_id'][$type] = 0;
    }
    
    switch ($type) {
        case 'twitter':
            $url .= '&since_id=' . $cache['last_id']['twitter'];
            break;
        case 'instagram':
            $url .= '&min_tag_id=' . $cache['last_id']['instagram'];
            break;
    }

	$tdata = file_get_contents($url);
	$tempdata[$type] = json_decode($tdata);
	if ($type == 'youtube'){
		echo '<pre>';
		print_r(json_decode($tdata));
		echo '</pre>';
	}
    
    switch ($type) {
        case 'twitter':
            $last_ids['twitter'] = $tempdata['twitter']->max_id;
            break;
        case 'instagram':
            if (isset($tempdata['instagram']->pagination->next_min_id)) {
                $last_ids['instagram'] = $tempdata['instagram']->pagination->next_min_id;
            } else {
                $last_ids['instagram'] = $cache['last_id']['instagram'];
            }
            break;
    }
}

// get the tempdata from twitter
foreach($tempdata['twitter']->results as $result){
    $data[strtotime($result->created_at)]['twitter'] = $result;
}
foreach($tempdata['instagram']->data as $result){
    $data[$result->created_time]['instagram'] = $result;
}

krsort($data);

$cache['last_id'] = $last_ids;
$cache['data'] = $data;

file_put_contents('./cache.php', serialize($cache));
