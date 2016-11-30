<?php
/*
Create Web Link - https://docs.box.com/reference#create-web-link
Creates a web link object within a given folder.
*/

function createLink($access_token, $id, $name, $description ,$url){
  $curl = shell_exec("curl https://api.box.com/2.0/web_links \
  -H \"Authorization: Bearer $access_token\" \
  -d '{\"url\":\"$url\", \"parent\": {\"id\": \"$id\"}, \"name\": \"$name\", \"description\": \"$description\"}' \
  -X POST");
  return json_decode($curl);
}

//ex: createLink(TOKEN, FOLDER-ID, NAME, DESCRIPTION, URL);
