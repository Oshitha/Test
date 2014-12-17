<?php
header('Content-Type: application/json');
$feed = new DOMDocument();
$feed->load('');
$json = array();

//testing 
//$json['title'] = $feed->getElementsByTagName('channel')->item(0)->getElementsByTagName('title')->item(0)->firstChild->nodeValue;
//$json['description'] = $feed->getElementsByTagName('channel')->item(0)->getElementsByTagName('description')->item(0)->firstChild->nodeValue;
//$json['link'] = $feed->getElementsByTagName('channel')->item(0)->getElementsByTagName('link')->item(0)->firstChild->nodeValue;

$items = $feed->getElementsByTagName('channel')->item(0)->getElementsByTagName('item');

$json['TopNewsGivenCat'] = array();

static $i = 0;

foreach($items as $item) {

	
   $title = $item->getElementsByTagName('title')->item(0)->firstChild->nodeValue;
   $description = $item->getElementsByTagName('description')->item(0)->firstChild->nodeValue;
   $pubDate = $item->getElementsByTagName('pubDate')->item(0)->firstChild->nodeValue;
   $guid = $item->getElementsByTagName('guid')->item(0)->firstChild->nodeValue;
   $link = $item->getElementsByTagName('link')->item(0)->firstChild->nodeValue;
   $content = $item->getElementsByTagName('encoded')->item(0)->firstChild->nodeValue;
   
   $thumbnail = $item->getElementsByTagName('thumbnail')->item(0) ? $item->getElementsByTagName('thumbnail')->item(0)->getAttribute('url') : '';
   $image = $item->getElementsByTagName('content')->item(0) ? $item->getElementsByTagName('content')->item(0)->getAttribute('url') : '';
	
	 $json['TopNewsGivenCat'][$i]['author'] = "AdaDerana";
	 $json['TopNewsGivenCat'][$i]['category'] = "AdaderanaBiz";
	 $json['TopNewsGivenCat'][$i]['categoryID'] = "44";
	 $json['TopNewsGivenCat'][$i]['contents'] = $content;
	 $json['TopNewsGivenCat'][$i]['id'] = "";
	 $json['TopNewsGivenCat'][$i]['image'] = $image;
	 $json['TopNewsGivenCat'][$i]['isBreaking'] = "true";
	 $json['TopNewsGivenCat'][$i]['lastUpdated'] = $pubDate;
	 $json['TopNewsGivenCat'][$i]['order'] = 0;
	 $json['TopNewsGivenCat'][$i]['thumbnail'] =  $thumbnail;
	 $json['TopNewsGivenCat'][$i]['title'] = $title;
	 $json['TopNewsGivenCat'][$i]['commenturl'] = "";
	 $json['TopNewsGivenCat'][$i]['webURL'] = "";
	 $json['TopNewsGivenCat'][$i]['link'] =  $link;
	
	
	
  
  
   
   //$json['TopNewsGivenCat'][$i]['guid'] = $guid;   
   //$json['TopNewsGivenCat'][$i]['link'] = $link;  
   //$json['TopNewsGivenCat'][$i]['content'] = $content;
	
	$i++;
   //content  
}


echo json_encode($json);


?>