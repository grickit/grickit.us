<?php
  if(isset($_SERVER['HTTP_IF_MODIFIED_SINCE'])) {
    header('HTTP/1.1 304 Not Modified');
  }

	elseif(isset($_GET['imageID']) && preg_match('/^([a-zA-Z0-9]{3,9})(.png|.gif|.jpg|.jpeg|.webm|.gifv)$/',$_GET['imageID'])) {
		$imageID = $_GET['imageID'];
		// Perform additional processing?

		$contents = file_get_contents("http://imgur.com/${imageID}");
		$length = strlen($contents);
		$timestamp = gmstrftime("%a, %d %b %Y %T %Z",time());
		$expires = gmstrftime("%a, %d %b %Y %T %Z",time()+31536000);

		header("Content-Type: image/png");
		header("Content-Length: ${length}");
	  header("Cache-Control: public, max-age=31536000");
    header("Expires: ${expires}");
    header("Last-Modified: ${timestamp}");
    header("E-Tag: ${imageID}_".time());
		echo $contents;
	}