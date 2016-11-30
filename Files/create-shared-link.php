<?php

/*
Create Shared Link - https://docs.box.com/reference#create-a-shared-link-for-a-file
Used to create a shared link for this particular file.
*/

function createSharedLink($fileid, $access_token, $access){
  $a = ["access" => $access];
  $data = array("shared_link" => $a);
  $header = array();
  $header[] = 'Authorization: Bearer'.' '.$access_token;
  $options = array(
  CURLOPT_URL => 'https://api.box.com/2.0/files/'.$fileid,
  CURLOPT_HTTPHEADER => $header,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "PUT",
  CURLOPT_POSTFIELDS => json_encode($data),
  );
  $ch = curl_init();
  curl_setopt_array($ch, $options);
  $result = curl_exec($ch);
  curl_close($ch);
  return json_decode($result);
}

//createSharedLink($fileid, $access_token, "collaborators");
