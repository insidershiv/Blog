<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

use Respect\Validation\Validator as v;
use model as m;
require_once __DIR__."/../util/autoloader.php";

$req_method = $_SERVER["REQUEST_METHOD"];

$usermanager = new m\UserManager();
$res = array("msg"=>" ");


if ($req_method == "POST") {
    $user_data = array();
    $data = json_decode(file_get_contents('php://input'), true);

    $isvalid =  v::keySet(
        v::key(
            "name",
            v::stringType()->notEmpty()
        ),
        v::key(
            "email",
            v::stringType()->email()
        ),
        v::key(
            "password",
            v::stringType()->length(8, null)
        )
    )->validate($data);


    if ($isvalid == false) {
        $msg="";
        http_response_code(400);
        if (v::key("password", v::length(8, null))->validate($data) == false) {
            $msg = "Password lentgh should be 8";
        } elseif (v::key("email", v::stringType()->email())->validate($data) == false) {
            $msg = "Invalid Email Address";
        } else {
            $msg = "Required Fields Missing";
        }
        $res = array("msg"=> $msg);
        
        echo json_encode($res);

        return;
    }

    
    $user_data["name"] = $data["name"];
    $user_data["email"] = $data["email"];
    $user_data["password"] = $data["password"];
    
    $search_constraint = array();
    $search_constraint["email"] = $data["email"];


    if ($usermanager->get_user($search_constraint)) {
        http_response_code(409);                          // response code shows that the server points duplicate data
        $res = array("msg"=> "user already exist");
        echo json_encode($res);
    } elseif ($usermanager->add_user($user_data)) {
        $res = array("msg"=>"User Created");
        echo json_encode($res);
    } else {
        http_response_code(400);
        $res= array("msg"=>"User Not Created");
        echo json_encode($res);
    }
}


/*           GET Method                 */


if ($req_method == "GET") {
    $data = $_GET["id"];
 
    $params = explode('/', $data);
   
   
    if (count($params) >2) {
        http_response_code(404);
        $usermanager->error = "Invalid Address";
    } elseif (count($params) == 2) {
        $id = $params[1];
        $fetch_fields = array("name", "email");
        $fetch_conditions = array("id"=>$id);
        $result = $usermanager->get_user($fetch_conditions);
        if ($result) {
            echo json_encode(($result));
        } else {
            $res = array("msg"=>$usermanager->get_error());
            echo json_encode($res);
        }
    }
}
/*               PATCH                      */

if ($req_method == "PATCH") {
    $id = '';
    $url_data = $_GET["id"];
    $params = explode("/", $url_data);
   
    if (count($params) >2) {
        http_response_code(404);
        $res = array("msg"=> "Invalid Input");
        echo json_encode($res);
        return;
    } elseif (count($params) == 2) {
        $id = $params[1];
    }
   
    
    if ($id) {
        $isTokenValid = true;
        $header = apache_request_headers();
        if (isset($header["Authorization"])) {
            $token = $header["Authorization"];
            $decoded_data = json_decode(Token::verify_token($token), true);
            
            if ($decoded_data["data"]["id"] != $id) {
                $isTokenValid = false;
            }
        } else {
            $isTokenValid = false;
        }

        if ($isTokenValid == false) {
            $res = array("msg"=> "Authorization Failed");
            echo json_encode($res);
            return;
        }
        
        
        
        $data = json_decode(file_get_contents('php://input'), true);
        
        // validation
        $isvalid =  v::keySet(
            v::key(
                "password",
                v::stringType()->length(8, null)
            )
        )->validate($data);
        
        if ($isvalid == false) {
            http_response_code(400);
            $res = array("msg"=> "Invalid Input");
            echo json_encode($res);
            return;
        }

        $password = $data["password"];
        
        // check if password is set (update)


        if ($usermanager->update_password($password, $id)) {
            $res = array("msg"=>"Password Updated");
            echo json_encode($res);
        } else {
            $res = array("msg"=> "password Not updated");
            echo json_encode($res);
        }
    } else {
        $res = array("msg"=> "User Id Not Specified");
        echo json_encode($res);
    }
}
