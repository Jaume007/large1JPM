<?php
require_once "init.php";
require_once "model.php";
$page=$_REQUEST['page'];
switch ($page){
    case 'index': index();
        break;
    case 'register': register();
        break;
    case 'newStory': newStory();
        break;
    case 'adLike':adLike();
}
function index(){
    $res=login($_REQUEST['user'],$_REQUEST['pwd']);
   if($res) echo '<script>window.location.replace("welcome.php");</script>';
    else echo '<script>window.location.replace("index.php?error=true");</script>';
}
function register(){
    $res=registerUser($_REQUEST['user'],$_REQUEST['pwd'],$_REQUEST['name']);
    if($res) echo '<script>window.location.replace("index.php?reg=true");</script>';
    else echo '<script>window.location.replace("register.php?error=true");</script>';
}
function newStory(){
    sanitize($_REQUEST);
    createStory($_REQUEST['title']);
    addContribution($_REQUEST['title'],$_REQUEST['contribution'],$_SESSION['user']);
    header('Location: welcome.php');
}
function adLike(){
    $id=$_REQUEST['id'];
    $story=$_REQUEST['story'];
    sumLike($id,$story);
    echo '<script>window.location.replace("story.php?id='.$story.'");</script>';
}
