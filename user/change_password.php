<?php

require "../core/init.php";

if (!$Users->isLogged()) {
    redirect(BASE_URL . "login.php");
}
$page_title = "Change password";
$user = $Users->getUser($_SESSION["id"]);

$data = [];
$error = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data["email"] = $user->email;
    if (isset($_POST["old_password"]) && !empty($_POST["old_password"])) {
        $data["old_password"] = $_POST["old_password"];
    } else {
        $error["old_password"] = "Old password is required!";
    }

    if (isset($_POST["password"]) && !empty($_POST["password"])) {
        $data["password"] = $_POST["password"];
    } else {
        $error["password"] = "Password is required!";
    }

    if (isset($_POST["repeat_password"]) && !empty($_POST["repeat_password"])) {
        if ($_POST["password"] !== $_POST["repeat_password"]) {
            $error["repeat_password"] = "Repeat password is not match with password!";
        }
    } else {
        $error["repeat_password"] = "Repeat password is required!";
    }

    if (count($error) === 0) {
        if ($Users->changePassword($data)) {
            redirect(BASE_URL . "user/account.php");
        } else {
            $error_msg = $Users->err_msg;
        };
    }

}

require "views/change_password.view.php";