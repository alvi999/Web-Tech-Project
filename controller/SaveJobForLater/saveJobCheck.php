<?php
require_once("../../model/saveJobModel.php");

session_start();



if(isset($_COOKIE["userId"])){
    $userId = $_COOKIE["userId"];
}
else if(isset($_SESSION["userId"])){
    $userId = $_SESSION["userId"];
}
else{
    echo json_encode(['error' =>"Not logged in"]);
}

echo  json_encode(saveJob($userId,$_REQUEST['id']));
?>
