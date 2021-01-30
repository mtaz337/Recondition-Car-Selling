<?php

class Photo extends Db_object {

    protected static $db_table = "photo";
    protected static $db_table_fields = array('id', 'title','caption', 'description', 'filename',' alternate_text', 'type', 'size','price','car_mileage','contact_no','car_location','car_tags','car_rating');
    public $id;
    public $title;
    public $caption;
    public $alt_text;
    public $description;
    public $filename;
    public $type;
    public $size;  
    public $price;  
    public $car_mileage;  
    public $contact_no;  
    public $car_location; 
    public $car_tags; 
    public $car_rating;
    public $temp_path;
    public $upload_directory = "images";
    public $errors = array();
 

    public function set_file($file) {            //passing $_FILES['upload_file'] as an argument
        if (empty($file) || !$file || !is_array($file)) {
            $this->errors[] = "There is no file uploaded here";
            return false;
        } elseif ($file['error'] != 0) {
            $this->errors[] = $this->upload_error[$file['error']];
            return false;
        } else {
            $this->filename = basename($file['name']);
            $this->temp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];
        }
    }
    
    public function picture_path(){
        return $this->upload_directory.DS.$this->filename;
    }

    public function save() {
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
    
    public function delete_photo(){
        if ($this->delete()){
            $target_path=SITE_ROOT.DS.'admin'.DS.$this->picture_path();
            return unlink($target_path)? true: false;
        }else{
            return false;
        }
    }

}
