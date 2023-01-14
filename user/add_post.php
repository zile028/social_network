<?php
require "../core/init.php";

if (!$Users->isLogged()) {
    redirect(BASE_URL . "login.php");
}
$page_title = "Add post";
$user = $Users->getUser($_SESSION["id"]);
$all_category = $Post->getCategory();
$data = [];
$error = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data["user_id"] = $user->id;
    $data["category_id"] = $_POST["category_id"];
    $data["public"] = $_POST["public"];

    if (isset($_POST["title"]) && !empty($_POST["title"])) {
        $data["title"] = $_POST["title"];
    } else {
        $error["title"] = "Title is required!";
    }

    if (isset($_POST["text"]) && !empty($_POST["text"])) {
        $data["text"] = $_POST["text"];
    } else {
        $error["text"] = "Post text is required!";
    }

    $image = $_FILES["image"];
    $allow_type = ["jpg", "jpeg", "png", "gif"];
    $upload = new Upload($image, $allow_type, 3 * MB);
    $isUpload = false;
    if ($upload->validate()) {
        $isUpload = $upload->storeFile(UPLOAD_PATH);
        $data["image"] = $upload->stored_name;
    }

    if (count($error) === 0 && $isUpload) {
        if ($Post->addPost($data)) {
            redirect(BASE_URL . "user/all_post.php");
        }
    }

}


require "views/add_post.view.php";