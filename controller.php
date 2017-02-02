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
    case 'adlike':adLike();
        break;
    case 'addCon': addCon();
        break;
    case 'cancel': setStatus(0,$_REQUEST['id']);header('Location: welcome.php');
        break;
}
function index(){
    $res=login($_REQUEST['user'],$_REQUEST['pwd']);
   if($res) header('Location: welcome.php');
    else header('Location: index.php?error=true');
}
function register(){
    $res=registerUser($_REQUEST['user'],$_REQUEST['pwd'],$_REQUEST['name']);
    if($res) header('Location: index.php?reg=true');
    else  header('Location: register.php?error=true');
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
    header('Location: story.php?id='.$story);

}
function addCon(){
    $id=$_REQUEST['id'];
    $end=$_REQUEST['end'];
    $contribution=$_REQUEST['contribution'];
    $story=searchStory($id);
    addContribution($story['title'],$contribution,$_SESSION['user']);
    if($end) setStatus(2,$id);
    else setStatus(0,$id);
}
