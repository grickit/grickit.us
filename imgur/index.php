<?php

  function outputHeaders($imageID,$length) {
    $timestamp = gmstrftime("%a, %d %b %Y %T %Z",time());
    $expires = gmstrftime("%a, %d %b %Y %T %Z",time()+31536000);

    header("Content-Length: ${length}");
    header("Content-Type: image/jpeg");
    header("Cache-Control: public, max-age=31536000");
    header("Expires: ${expires}");
    header("Last-Modified: ${timestamp}");
    header("E-Tag: ${imageID}_".time());
  }

  if(isset($_SERVER['HTTP_IF_MODIFIED_SINCE'])) {
    header('HTTP/1.1 304 Not Modified');
    die();
  }

  elseif(isset($_GET['imageID']) && preg_match('/^([a-zA-Z0-9]{3,9})$/',$_GET['imageID'],$matches)) {
    $imageID = $matches[1];

    $contents = file_get_contents("http://i.imgur.com/${imageID}.jpeg");
    outputHeaders($imageID,strlen($contents));
    echo $contents;
  }