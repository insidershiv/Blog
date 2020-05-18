<?php

namespace model;

require_once  __DIR__ . '/../util/autoloader.php';


class BlogManager
{
    private $blog_post;
    private $blog_title;
    private $user_id;
    private $post_data = array();



    public function __construct()
    {
        $this->tbname = "post";
        $this->conn = \Connection::getConnection();
        //$this->querybuilder = new \QueryBuilder($this->tbname, $this->conn);
        $this->error = "NO ERROR";
    }

    public function get_error()
    {
        return $this->error;
    }


    public function add_post($title, $body, $user_id)
    {
        $querybuilder = new \QueryBuilder($this->tbname, $this->conn);
        $this->post_data["title"] = $title;
        $this->post_data["body"] = $body;
        $this->post_data["user_id"] = $user_id;
        $querybuilder->insert($this->post_data);

        if ($querybuilder->execute()) {
            $blog_id = $this->conn->lastInsertID();
            return $blog_id;
        } else {
            $this->error = "could not insert";
            return false;
        }
    }


    public function delete_post($user_id, $id)
    {
        $querybuilder = new \QueryBuilder($this->tbname, $this->conn);
        $this->post_data["user_id"] = $user_id;
        $this->post_data["id"] = $id;

        $querybuilder->delete($this->post_data);

        if ($querybuilder->execute()) {
            return true;
        } else {
            $this->error = "could not be deleted";
            return false;
        }
    }


    public function update_post($user_id, $id, $body, $title)
    {
        $field_to_update = array("body"=>$body,"title"=>$title);
        $conditions_for_update = array("user_id"=>$user_id, "id"=>$id);

        $post = $this->get_post($id);
        
        if ($post) {
            // if post already available otherwise query will fail
            if ($post["title"] == $title && $post["body"] == $body) {
                return true;
            }
        }
        
        $uquery = new  \QueryBuilder($this->tbname, $this->conn);
        $uquery->update($field_to_update, $conditions_for_update);
        if ($uquery->execute()) {
            return true;
        } else {
            $this->error = "Could Not Update Post";
            return false;
        }
    }


    public function get_post($id)
    {   
        $querybuilder = new \QueryBuilder($this->tbname, $this->conn);
        $fetch_condition = array("id"=>$id);
        $fetch_fields = array("body", "user_id", "id", "title","timestamp");
        
        
        $querybuilder->get($fetch_condition, $fetch_fields);
        $data = $querybuilder->execute();
        if ($data) {
            return $data;
        } else {
            return false;
        }
    }


    public function get_all_post($user_id)
    {   $querybuilder = new \QueryBuilder($this->tbname, $this->conn);
        $fetch_condition = array("user_id"=>$user_id);
        $fetch_fields = array("body", "id", "user_id", "title","timestamp");
        $querybuilder->getall($fetch_fields, $fetch_condition);
        $data = $querybuilder->execute();
        if ($data) {
            return $data;
        } else {
            $this->error = "No data associated with given user_id";
            return false;
        }
    }
}
