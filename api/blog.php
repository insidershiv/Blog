<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
use Respect\Validation\Validator as v;

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__ . "/../util/autoloader.php";
require_once __DIR__."/../util/helper.php";
$blogmanager = new model\blogmanager();
$usermanager = new model\usermanager();


$res = array("msg" => " ");

$req_method = $_SERVER["REQUEST_METHOD"];
$header = apache_request_headers();




if ($req_method == "POST") {
    $header = apache_request_headers();
 

    if (isset($header["Authorization"])) {
        $token = $header["Authorization"];
        $decoded_data  = json_decode(Token::verify_token($token), true);
        if ($decoded_data == false) {
            $res = array("msg"=>"Unauthorized Access");
            echo json_encode($res);
            return;
        }
    } else {
        $res = array("msg"=>"Unauthorized Access");
        echo json_encode($res);
        return;
    }
    

    $data = json_decode(file_get_contents('php://input'), true);

   

    $isValid =  v::keySet(
        v::key(
            "title",
            v::stringType()->notEmpty()
        ),
        v::key(
            "body",
            v::stringType()->notEmpty()
        )
    )->validate($data);




    if (!$isValid) {
        http_response_code(400);
        $res= array("msg"=>"required fields missing");
        echo json_encode($res);
        return;
    }
        


       
    $title = $data["title"];
    $body = $data["body"];

    $tmp = "<script> console.log(\"Test\") </script> <p> </p>";
    
    $sanitizer = HtmlSanitizer\Sanitizer::create([
        'extensions' => ['basic', 'code', 'image', 'list', 'table'],

        'tags' => [
          
            'img' => [
                'allowed_attributes' => ['src', 'id'],
            ],
        ],

    ]);

    $body = $sanitizer->sanitize($body);
    

    $token = $header["Authorization"];
    $decoded_data  = json_decode(Token::verify_token($token), true);
            
    $id = $decoded_data["data"]["id"];
    $blog_id = $blogmanager->add_post($title, $body, $id); 
    if ($blog_id) {
        
        $blogmanager = new model\blogmanager();
        $res =  $blogmanager->get_post($blog_id);
        
        $imagemanager = new model\imagemanager();
        if($imagemanager->update_image($res["id"], $res["user_id"])) {
            
            http_response_code(200);
            echo json_encode($res,JSON_UNESCAPED_SLASHES);
            
        }else {
            http_response_code(400);
            $res = array("msg"=>$imagemanager->get_error());
            echo json_encode($res);
        }


       
    } else {
        http_response_code(400);
        $res  = array("msg"=> $blogmanager->get_error());
        echo json_encode($res);
    }
}


/***************** DELETE REQUEST*************** */


elseif ($req_method == "DELETE") {
    $header = apache_request_headers();
    $data = $_GET["post_id"];
    $params = explode('/', $data);
    
   
    if (count($params) !=2) {
        http_response_code(404);
        $res = array("msg"=> "id missing");
        echo json_encode($res);
    } else {
        $id = $params[1];

        if (isset($header["Authorization"])) {
            $token = $header["Authorization"];
            $decoded_data  = json_decode(Token::verify_token($token), true);
            if ($decoded_data) {
                $user_id = $decoded_data["data"]["id"];
                
                if ($blogmanager->delete_post($user_id, $id)) {
                    http_response_code(200);
                    $res = array("msg" => "Post deleted");
                    echo json_encode($res);
                } else {
                    http_response_code(400);
                    $res = array("msg" => "Could not delete user post");
                    echo json_encode($res);
                }
            } else {
                http_response_code(401);
                $res = array("msg"=> "User Not authorized");
                echo json_encode($res);
            }
        } else {
            http_response_code(400);
            $res = array("msg"=> "Token missing in the header");
            echo json_encode($res);
        }
    }
}

/*  *******************PATCH*******************     */


elseif ($req_method == "PATCH") {
    $header = apache_request_headers();
    
    $post_data = json_decode(file_get_contents('php://input'), true);
   
    if (isset($post_data["body"]) && isset($post_data["title"])) {
        $body = $post_data["body"];
        $title   = $post_data["title"];
        $data = $_GET["post_id"];
        $params = explode('/', $data);
        if (count($params) !=2) {
            http_response_code(404);
            $res = array("msg"=> "id missing");
        } else {
            $id = $params[1];
            
            if (isset($header["Authorization"])) {
                $token = $header["Authorization"];
                $decoded_data  = json_decode(Token::verify_token($token), true);
                if ($decoded_data) {
                    $user_id = $decoded_data["data"]["id"];
                    
                    if ($blogmanager->update_post($user_id, $id, $body, $title)) {
                        $res = array("msg" => "Post updated");
                        echo json_encode($res);
                    } else {
                        http_response_code(400);
                        
                        $res = array("msg" => "Could not update post");
                        echo json_encode($res);
                    }
                } else {
                    http_response_code(401);
                    $res = array("msg" => "User Not authorized");
                    echo json_encode($res);
                }
            } else {
                http_response_code(400);
                $res = array("msg" => "Token missing in the header");
                echo json_encode($res);
            }
        }
    } else {
        http_response_code(422);
        $res = array("msg" => "please specify Post content");
        echo json_encode($res);
    }
}


/* *****************GET******************* */

elseif ($req_method == "GET") {
    if (isset($_GET["post_id"])) {
        $header = apache_request_headers();
        if (isset($header["Authorization"])) {
            $token = $header["Authorization"];
            $decoded_data  = json_decode(Token::verify_token($token), true);
            if ($decoded_data) {
                $user_id = $decoded_data["data"]["id"];


                $data = $_GET["post_id"];
                $data = rtrim($data, '/');
        
       
                $params = explode('/', $data);
                if (count($params) > 2) {
                    // invalid parameters more than 2
                    http_response_code(404);
                    $res = array("msg" => "id missing");
                    echo json_encode($res);
                } elseif (count($params)==1) {
                    //get agell posts
                    $data = $blogmanager->get_all_post($user_id);
                    $res = $data ? $data : array();
                    echo json_encode($res);
                } else {
                    $id = $params[1];
                    $data =  $blogmanager->get_post($id);
                    
                    if ($data) {
                        http_response_code(200);
                        echo json_encode($data);
                    } else {
                        http_response_code(404);
                        $res = array("msg"=>"No such blog exists");
                        echo json_encode($res);
                    }
                }
            } else {
                http_response_code(401);
                $res = array("msg"=>"Unauthorized Access");
                echo json_encode($res);
            }
        } else {
            $res = array("msg"=>"Token not set in Header");
            echo json_encode($res);
        }
    }
}
?>