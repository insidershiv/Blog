<?php

namespace model;

require_once  __DIR__ . '/../util/autoloader.php';




class ImageManager
{
    private $allowed_extensions;
    private $tbname;
    private $conn;
    private $file = '';
    public $error ="No error";

    public function __construct()
    {
        $this->tbname = "image";
        $this->allowed_extensions = array("jpg", "jpeg", "png");
        $this->conn =  \Connection::getConnection();
    }

    public function get_error()
    {
        return $this->error;
    }


    public function file_upload($file_data, $user_id)
    {
        $path =  $_SERVER["DOCUMENT_ROOT"];  // getting path of server or ROOT

        // $dir = $path."/".$project."/uploads/";
    
        $dir = $path ."/uploads/";
      
        if ($file_data["file"]) {
            $file_name = $file_data["file"]["name"];
        
            $file_param_count = explode(".", $file_name);
        
        
        
            $tmp_name = $file_data["file"]["tmp_name"];
            
            $temp_extension = $file_data["file"]["type"];
        
            $file_extension = explode('/', $temp_extension);
        
            $file_extension = $file_extension[1];
       
        
            if (! (array_search($file_extension, $this->allowed_extensions)) || count($file_param_count) >2) {
                $this->error = "inavild file format";
                return false;
            } else {
                $file = uniqid();
        
        
            
        
                $uploadfile = $dir . $file . "." .$file_extension;
                
                $hostadress = $_SERVER["HTTP_HOST"];
        
              
        
              
                $src =   "uploads/" . $file  ."." . $file_extension;
                
              
        
                if (move_uploaded_file($file_data['file']['tmp_name'], $uploadfile)) {
                    $res = array("src"=>$src, "user_id"=>$user_id, "id"=>$file );
                       
                     return ($this->insert_image($res));
                } else {
                    $this->error  = "File upload Error";
                    return false;
                }
            }
        }
    }




    private function insert_image($image_data)
    {
        $querybuilder = new \QueryBuilder($this->tbname, $this->conn);

        $querybuilder->insert($image_data);

        if ($querybuilder->execute()) {
            
            return $image_data;
        } else {
            $hostadress = $_SERVER["HTTP_HOST"];
            $file_name = $image_data["src"];
            $delete_file = ($_SERVER["DOCUMENT_ROOT"] . "/". $file_name);
         
            unlink($delete_file);
            return false;
        }
    }




    public function delete_image($id)
    {
        $conditions_to_delete = array("id"=>id);

        $querybuilder->delete($conditions_to_delete);
    
        if ($querybuilder->execute()) {
            echo "deleted";
        } else {
            echo "something went wrong";
        }
    }



    public function update_image($post_id, $user_id)
    {   
      
        $querybuilder = new \QueryBuilder($this->tbname, $this->conn);
        $querybuilder->get(array("user_id"=>$user_id,"post_id"=>0) ,  array("id"));

        $id = $querybuilder->execute();
        
        // doesn't have any Image
        if ($id == false)
            return true;

        $data = array("prev_postid"=>0,"new_postid" => $post_id, "user_id"=> $user_id);
        $query = "UPDATE image set post_id = :new_postid WHERE user_id = :user_id AND post_id = :prev_postid";
        $stmt = $this->conn->prepare($query);

        $stmt->execute($data);
        if ($stmt->rowCount()) {
            return true;
        } else {
            $this->error = "image not uploaded";
            return false;
        }
    }
       

}
?>