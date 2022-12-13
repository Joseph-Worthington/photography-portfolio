<?php

//Get the site url

function retrieve_url(){
    return sprintf(
      "%s://%s%s",
      isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
      $_SERVER['SERVER_NAME'], "/photography-portfolio"
    );
  }

  // $url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

  // Get image path
function image_path($image){
    return retrieve_url()."/assets/imgs".$image;
}