<?php 

namespace WebSquad\Goutam\Pioneer; 

/**
 * 
 * file upload
 */

trait ImageUpload{
  protected function upload ( array $files, $path = "media/", $ext=["png", "jpg", "jpeg", "gif"]){
       // file manage 
       $tmp_name = $files["tmp_name"];
       $file_name = $files["name"];
   
     
       // get file extension
       $file_arr = explode(".", $file_name);
       $file_ext = strtolower(end($file_arr));
     
       // file name unique 
        $unique_file_name = time() . "_" . rand(100000, 10000000) . "." . $file_ext;
   
        // directory check 
        if (!is_dir($path)) {
          mkdir($path);
        }

        // file extension check
        if (!in_array($file_ext, $ext)) {
            echo "Invalid File Format";
            return false;
        }

        // upload file
        move_uploaded_file($tmp_name, $path . $unique_file_name);
   
   
        // return file name 
        return  $unique_file_name;
  }
}







?>