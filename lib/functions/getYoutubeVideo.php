<?php
function getYoutubeVideo($youtubeKey, $width=0, $height=0){
	//$v = '<iframe src="https://www.youtube.com/embed/'.$youtubeKey.'" width="262" height="148" frameborder="0" allowfullscreen=""></iframe>';
	//$v = '<iframe src="https://www.youtube.com/embed/'.$youtubeKey.'" class="youtubevideoembed" frameborder="0" allowfullscreen="true"></iframe>';
	if( $width===0 || $height===0 ){
		$width=560; $height=315;
	}
	$v = '<iframe width="'.$width.'" height="'.$height.'" src="https://www.youtube.com/embed/'.$youtubeKey.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
	return $v;
}
?>
