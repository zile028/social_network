<?php
require "../core/init.php";

if (!$Users->isLogged()) {
    redirect(BASE_URL . "login.php");
}
$page_title = "User home";
$user = $Users->getUser($_SESSION["id"]);
$all_post = $Post->getAllUserPost($user->id);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $_POST["public"] == 1 ? $public = 0 : $public = 1;
    $Post->changePublic($_POST["id"], $public);
    redirect(BASE_URL . "user/all_post.php");
}


require "views/all_post.view.php";