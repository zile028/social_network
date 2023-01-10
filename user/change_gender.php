<?php
require "../core/init.php";

if (!$Users->isLogged()) {
    redirect(BASE_URL . "login.php");
}
if (isset($_GET["gender"])) {
    $gender = $_GET["gender"];
    if ($gender === "male") {
        $Users->changeGender($_SESSION["id"], "female");
    } else if ($gender === "female") {
        $Users->changeGender($_SESSION["id"], "male");
    }
    redirect(BASE_URL . "user/account.php");
}
