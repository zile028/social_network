<?php
require "core/init.php";
if (!$Users->isLogged()) {
    redirect(BASE_URL . "login.php");
}
$user = $Users->getUser($_SESSION["id"]);
$page_title = "Home";
$all_category = $Post->getCategory();
$user_voting = $Post->userVoting($user->id);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $all_post = $Post->searchPost($_POST["search"]);
} else {
    if (isset($_GET["user_id"])) {
        $all_post = $Post->getAllPublicUserPost($_GET["user_id"]);
    } else {
        $all_post = $Post->getAllPublicPost();
    }
}


require "views/index.view.php"

?>

