<?php
require "../core/init.php";

if (!$Users->isLogged()) {
    redirect(BASE_URL . "login.php");
}
$page_title = "User home";
$user = $Users->getUser($_SESSION["id"]);


require "views/account.view.php";