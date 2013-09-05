<?php
$objDOM = new DOMDocument(); 
$objDOM->load('latestnews.xml');
$newsitem = $objDOM->getElementsByTagName("newsitem"); 

echo 'Latest News: ';

foreach( $newsitem as $newsitem )
  {
    $dates = $newsitem->getElementsByTagName("date");
    $date = $dates->item(0)->nodeValue;

    $contents = $newsitem->getElementsByTagName("content");
    $content  = $contents->item(0)->nodeValue;
	

	echo '..::	Date:	' . $date . '	|	Content:	' . $content . '::..		';
  }
 ?>