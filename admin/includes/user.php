<?php

class User extends Db_object {

    protected static $db_table = "users";
    protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name','user_image','email');
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $user_image;
    public $email;
    public $upload_directory="images";
    public $image_placeholder="http://placehold.it/400x400&text=image";


  

    
    public function upload_photo() {
      
            if (!empty($this->errors)) {
                return false;
            }
            if (empty($this->user_image) || empty($this->temp_path)) {
                $this->errors[] = "The file is not available";
                return false;
            }

            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image;

            if (file_exists($target_path)) {
                $this->errors = "This file {$this->user_image} already exists";
                return false;
            }
            if (move_uploaded_file($this->temp_path, $target_path)) {

                    unset($this->temp_path);
                    return true;
            }else {
                    $this->errors = "The File Directory does not have permission";
                    return false;
                }
              
            }
            
                public function save_user_and_image() {
        if ($this->id) {
            $this->update();
        } else {
            if (!empty($this->errors)) {
                return false;
            }
            if (empty($this->filename) || empty($this->temp_path)) {
                $this->errors[] = "The file is not available";
                return false;
            }

            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->filename;

            if (file_exists($target_path)) {
                $this->errors = "This file {$this->filename} already exists";
                return false;
            }
            if (move_uploaded_file($this->temp_path, $target_path)) {
                if ($this->create()) {
                    unset($this->temp_path);
                    return true;
                } else {
                    $this->errors = "The File Directory does not have permission";
                    return false;
                }
              
            }
        }
    }
        
    
    
    
public function image_path_and_placeholder(){
    return empty($this->user_image)?$this->image_placeholder:$this->upload_directory.DS.$this->user_image;
}


    public static function verify_user($username, $password) {
        global $database;

        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM ".self::$db_table. " WHERE username='{$username}' AND password='{$password}' LIMIT 1";

        $the_result_array = self::find_by_query($sql);

        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }
    
    public static function register_user($username, $password) {
        global $database;

        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM ".self::$db_table. " WHERE username='{$username}' AND password='{$password}' LIMIT 1";

        $the_result_array = self::find_by_query($sql);

        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }
  
}

