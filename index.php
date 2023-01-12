<?php
require "core/init.php";
if (!$Users->isLogged()) {
    redirect(BASE_URL . "login.php");
}
$user = $Users->getUser($_SESSION["id"]);
$page_title = "Home";
$all_category = $Post->getCategory();
if (isset($_GET["user_id"])) {
    $all_post = $Post->getAllPublicUserPost($_GET["user_id"]);
} else {
    $all_post = $Post->getAllPublicPost();
}


require "views/index.view.php"

?>

