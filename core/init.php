<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require "config.php";
require "helpers.php";
require "Connection.php";
require "Users.php";
require "Post.php";
