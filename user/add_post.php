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
//    VALIDATE IMAGE
//    check size
//    check type
//    generate file name
//    check upload folder is exists
    $image = $_FILES["image"];
    $isUpload = false;
    if (!empty($image["name"])) {
        $file_size = $image["size"];
        $file_name = $image["name"];
        $tmp_name = $image["tmp_name"];
        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $stored_name = time() . "." . $file_type;
        $allow_type = ["jpg", "jpeg", "png", "gif"];
        $error_img = [];
        if (!in_array($file_type, $allow_type)) {
            $error_img["file_type"] = "This file type is not allowed, allowed type is: " . implode(", ", $allow_type);
        }

        if ($file_size > 3 * MB) {
            $error_img["file_size"] = "This file is to big, allowed size is 3MB";
        }

        if (count($error_img) === 0) {
            if (!file_exists(UPLOAD_PATH)) {
                mkdir(UPLOAD_PATH);
            }
            $isUpload = move_uploaded_file($tmp_name, UPLOAD_PATH . $stored_name);
            $data["image"] = $stored_name;

        }
    }
    if (count($error) === 0 && $isUpload) {
        if ($Post->addPost($data)) {
            redirect(BASE_URL . "user/all_posts.php");
        }
    }

}


require "views/add_post.view.php";