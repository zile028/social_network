<?php
require "core/init.php";
$page_title = "Login";

$data = [];
$error = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["email"]) && !empty($_POST["email"])) {
        $data["email"] = $_POST["email"];
    } else {
        $error["email"] = "Email is required!";
    }

    if (isset($_POST["password"]) && !empty($_POST["password"])) {
        $data["password"] = $_POST["password"];
    } else {
        $error["password"] = "Password is required!";
    }


    if (count($error) === 0) {
        if ($Users->login($data)) {
            redirect("user/home.php");
        } else {
            $error_msg = $Users->err_msg;
        }
    }

}

require "views/login.view.php";