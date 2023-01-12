<?php
require "core/init.php";
if (!$Users->isLogged()) {
    redirect(BASE_URL . "login.php");
}
$user = $Users->getUser($_SESSION["id"]);
$page_title = "Home";
if (isset($_GET["id"])) {
    $all_post = $Post->getAllUserPost($_GET["id"]);
}
$all_category = $Post->getCategory();
require "views/user_post.view.php"

?>

