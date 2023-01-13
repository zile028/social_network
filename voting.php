<?php
require "core/init.php";

if (!$Users->isLogged()) {
    redirect(BASE_URL . "index.php");
}

if (isset($_GET["post_id"])) {
    $Post->voting($_GET["post_id"], $_SESSION["id"]);
    redirect(BASE_URL . "index.php#" . $_GET["post_id"]);
}