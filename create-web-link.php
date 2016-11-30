<?php
/*
Create Web Link - https://docs.box.com/reference#create-web-link
Creates a web link object within a given folder.
*/

function createLink($access_token,$id){
  $link = "curl https://api.box.com/2.0/web_links \
  -H \"Authorization: Bearer $access_token\" \
  -d '{\"url\":\"https://www.box.com\", \"parent\": {\"id\": \"$id\"}, \"name\": \"Box Website!\", \"description\": \"Cloud Content Management\"}' \
  -X POST";
  $curl = shell_exec($link);
  return json_decode($curl);
}
echo json_encode( createLink($access_token,'11667107971') );
