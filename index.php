<?php
require "core/init.php";
if (!$Users->isLogged()) {
    redirect(BASE_URL . "login.php");
}
$user = $Users->getUser($_SESSION["id"]);
$page_title = "Home";
require "views/index.view.php"

?>

