<?php
require "../core/init.php";

if (!$Users->isLogged()) {
    redirect(BASE_URL . "login.php");
}
$page_title = "Edit post";
$user = $Users->getUser($_SESSION["id"]);
$all_category = $Post->getCategory();

$data = [];
$error = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data["id"] = $_POST["id"];
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
    $isUpload = false;
    if (!empty($image["name"])) {
        $allow_type = ["jpg", "jpeg", "png", "gif"];
        $upload = new Upload($image, $allow_type, 3 * MB);
        if ($upload->validate()) {
            if (file_exists(UPLOAD_PATH . $_POST["old_image"])) {
                unlink(UPLOAD_PATH . $_POST["old_image"]);
            }
            $isUpload = $upload->storeFile(UPLOAD_PATH);
            $data["image"] = $upload->stored_name;
        }
    } else {
        $isUpload = true;
        $data["image"] = $_POST["old_image"];
    }

    if (count($error) === 0 && $isUpload) {
        if ($Post->editPost($data)) {
            redirect(BASE_URL . "user/all_post.php");
        } else {
            dd($Post->err_msg);
        }
    }

} else {
    $post = $Post->getPost($_GET["id"]);

}


require "views/edit_post.view.php";