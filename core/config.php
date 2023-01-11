<?php
const config = [
    "host" => "localhost",
    "user" => "root",
    "password" => "",
    "database" => "social_network"
];

define("BASE_URL", "/social_network/");
const KB = 1024;
const MB = 1048576;
const UPLOAD_DIR = "public/";
define("UPLOAD_PATH", dirname(__DIR__) . "/" . UPLOAD_DIR);