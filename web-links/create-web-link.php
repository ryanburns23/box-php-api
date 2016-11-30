<?php
/*
Create Web Link - https://docs.box.com/reference#create-web-link
Creates a web link object within a given folder.
*/

function createWebLink($access_token, $url, $id, $name, $description){
  $header = ['Authorization: Bearer'.' '.$access_token];
  $params = json_encode( [ 'name'=> $name, 'parent'=> ["id"=> $id], 'url'=> $url, 'description' => $description ]);
  $options = array(
    CURLOPT_URL => 'https://api.box.com/2.0/web_links',
    CURLOPT_POSTFIELDS => $params,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => $header,
    CURLOPT_RETURNTRANSFER => true,
  );
  $ch = curl_init();
  curl_setopt_array($ch, $options);
  $result = curl_exec($ch);
  curl_close($ch);
  return json_decode($result);
};

//createLink(TOKEN, URL, FOLDER_ID, NAME, DESCRIPTION);
