<?php

class Upload
{
    public $error_file = [];

    public function __construct($file, $allow_type, $limit_size)
    {
        $this->file_size = $file["size"];
        $this->file_name = $file["name"];
        $this->tmp_name = $file["tmp_name"];
        $this->file_type = strtolower(pathinfo($this->file_name, PATHINFO_EXTENSION));
        $this->stored_name = time() . "." . $this->file_type;
        $this->allow_type = $allow_type;
        $this->limit_size = $limit_size;
    }

    public function validate()
    {
        if (!in_array($this->file_type, $this->allow_type)) {
            $this->error_file["file_type"] = "This file type is not allowed, allowed type is: " . implode(", ", $this->allow_type);
        }

        if ($this->file_size > $this->limit_size) {
            $this->error_file["file_size"] = "This file is to big, allowed size is 3MB";
        }
        return count($this->error_file) === 0;
    }

    public function storeFile($upload_path)
    {
        if (!file_exists($upload_path)) {
            mkdir($upload_path);
        }
        return move_uploaded_file($this->tmp_name, $upload_path . $this->stored_name);
    }
}