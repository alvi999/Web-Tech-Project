<?php

$userId = "";
$userType = "";
if (isset($_COOKIE['auth']) && isset($_COOKIE['userId']) && isset($_COOKIE['userType'])) {
    $userId = $_COOKIE['userId'];
    $userType = $_COOKIE['userType'];
} else {
    session_start();
    if (isset($_SESSION['auth']) && isset($_SESSION['userId']) && isset($_SESSION['userType'])) {
        $userId = $_SESSION['userId'];
        $userType = $_SESSION['userType'];
    } else {
        header('location: ../Auth/login.php');
    }
}

if ($userType != "recruiter") {
    header('location: ../BrowseJobs/browseAllJObs.php');
}

if (!isset($_REQUEST['id'])) {
    echo json_encode(['error' => "invalidJobId!"]);
} else {
    include_once("../../model/jobModel.php");
    $id = $_REQUEST['id'];
    echo json_encode(fetchOneJob($id));
    if (isset($job['error'])) {
        echo json_encode(['error' => "invalidJobId"]);
    }
}
