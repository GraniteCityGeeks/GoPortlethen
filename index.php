<?php
//namespace ContentMS;
//Start Debugger

//Log file access attempts into \Logger\AccessedFiles

//Pull file for access from URL and pass into \ContentMS\Template


define('INCLUDE_DIR', dirname(__FILE__) . '/inc/');

$rules = array(

    //Changed Files
    'About' => "About",

    //Unchanged files - fix shorttags and they'll work - CSS support possible if referenced properly
    'contactus' => "/contactus",
    'blog' => "/blog",
    'blog_article' => "/blog/(?'blogID'[\w\-]+)",

    'login' => "/login",
    'create_article' => "/createarticle",
    'view' => "/view",
    'logout' => "/logout",
    'register' => "/register",
    'add' => "/add",
    'Edit' => "/Edit/(?'userID'[\w\-]+)",
    'delete' => "/delete/(?'userID'[\w\-]+)",
    'ConfirmUser' => "/ConfirmUser/(?'userID'[\w\-]+)",
    'AddUser' => "/AddUser",
    'Clubs' => "/Clubs/(?'linkref'[\w\-]+)",
    'viewclubs' => "/viewclubs",
    'modifyclub' => "/modifyclub",
    'createclub' => "/createclub",
    'mapsindex' => "/mapsindex",
    'markers' => "/markers",
    'MarkerAdmin' => "/MarkerAdmin",
    'deletemarker' => "/deletemarker",
    'markercreate' => "/markercreate",
    'markerdelete' => "/markerdelete",
    'create_club_article' => "/clubarticle",
    'joinclub' => "/joinclub",
    '/healthFinal/webPages/healthyLiving' => "/healthyliving",
    '/healthFinal/webPages/index' => "/index",
    '/healthFinal/webPages/adminpage' => "/adminpage",
    '/healthFinal/webPages/contributorPage' => "/contributorPage",
    '/healthFinal/webPages/dbconnect' => "/dbconnect",
    '/healthFinal/webPages/editHealth' => "/editHealth",
    '/healthFinal/webPages/editnewsfeed' => "/editnewsfeed",
    'ViewArticles' => "/ViewArticles",
    'deleteArticle' => "/deleteArticle/(?'clubarticleid'[\w\-]+)",
    'confirmArticle' => "/confirmArticle/(?'clubarticleid'[\w\-]+)",

    'home' => "/"

);

//Garbage code - use \ContentMS\Router instead
$uri = rtrim(dirname($_SERVER["SCRIPT_NAME"]), '/');
$uri = '/' . trim(str_replace($uri, '', $_SERVER['REQUEST_URI']), '/');
$uri = urldecode($uri);

foreach ($rules as $action => $rule) {
    if (preg_match('~^' . $rule . '$~i', $uri, $params)) {
        include(INCLUDE_DIR . $action . '.php');
        exit();
    }
}

//pointless serving 404 if we're using \Router instead
// nothing is found so handle the 404 error
include(INCLUDE_DIR . '404.php');
