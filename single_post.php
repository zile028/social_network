<?php
require "core/init.php";

if (!$Users->isLogged()) {
    redirect(BASE_URL . "login.php");
}
$user = $Users->getUser($_SESSION["id"]);
$page_title = "Home";
if (isset($_GET["id"])) {
    $post = $Post->getPost($_GET["id"]);
} else {
    redirect(BASE_URL . "index.php");
}
$all_category = $Post->getCategory();

require "views/single_post.view.php";