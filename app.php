<?php

$tempdata = array();
$data = array();

$json = array(
	"twitter"        =>    "http://search.twitter.com/search.json?q=zottesfeer",
	"instagram"		 =>	   "https://api.instagram.com/v1/tags/zottesfeer/media/recent?client_id=8055d947e80c46e99ff0f8556a6bdbb3",
	// "flickr"		 =>	   "http://api.flickr.com/services/feeds/photos_public.gne?text=zotte%2Bsfeer&format=json"
);

// loop over the lists
foreach($json as $type => $url){

	$tdata = file_get_contents($url);
	$tempdata[$type] = json_decode($tdata);
	if ($type == 'flickr'){
		echo '<pre>';
		print_r(json_decode($tdata));
		echo '</pre>';
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