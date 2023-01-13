<?php
require "../core/init.php";

if (!$Users->isLogged()) {
    redirect(BASE_URL . "login.php");
}

if (isset($_GET["id"])) {
    $post = $Post->getPost($_GET["id"]);
    if (file_exists(UPLOAD_PATH . $post->image)) {
        unlink(UPLOAD_PATH . $post->image);
    }
    $Post->deletePost($_GET["id"]);
    redirect(BASE_URL . "user/all_post.php");
}