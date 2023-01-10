<?php
require "core/init.php";
$page_title = "Register";
$data = [];
$error = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data["gender"] = $_POST["gender"];
    $data["role"] = "user";

    if (isset($_POST["first_name"]) && !empty($_POST["first_name"])) {
        $data["first_name"] = $_POST["first_name"];
    } else {
        $error["first_name"] = "First name is required!";
    }

    if (isset($_POST["last_name"]) && !empty($_POST["last_name"])) {
        $data["last_name"] = $_POST["last_name"];
    } else {
        $error["last_name"] = "Last name is required!";
    }

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

    if (isset($_POST["repeat_password"]) && !empty($_POST["repeat_password"])) {
        if ($_POST["password"] !== $_POST["repeat_password"]) {
            $error["repeat_password"] = "Repeat password is not match with password!";
        }
    } else {
        $error["repeat_password"] = "Repeat password is required!";
    }

    if (count($error) === 0) {
        if ($Users->register($data)) {
            redirect("login.php");
        }
    }

}

require "views/register.view.php";