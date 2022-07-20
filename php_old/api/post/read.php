<?php
header("Access-Control-Allow-Headers: Date,Server,X-Powered-By,Access-Control-Allow-Origin,Access-Control-Allow-Methods,Set-Cookie,Expires,Cache-Control,Pragma,Content-Length,Keep-Alive,Connection,Content-Type");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Content-Type:application/json");

include_once '../../config/Database.php';
include_once '../../models/Post.php';

// Instantiation de la database
$database = new Database();
$db = $database->connect();

//instance user

$users = new id_users($db);

//Blog post query
$result = $users->read();

// Get row count
$num = $result->rowCount();

// check if any ubnsers

if($num > 0) {
// post array
$posts_arr = array();
$posts_arr['data'] = array();

while($row = $result->fetch(PDO::FEtCH_ASSOC)) {
  extract($row);
  $post_item = array(
    'id_users' => $id_users,
    'email' => $email,
    'password' => $password,
    'lastname' => $lastname,
    'firstname'=> $firstname,
    'level' => $level
  );

  // push to "data"
  array_push($posts_arr['data'], $post_item);
}

//echo json_encode($posts_arr);
} else{
  // pas de users
  array('message' => 'Pas infos users présent');
}


