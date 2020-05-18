<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once __DIR__ . "/../util/autoloader.php";
$blogmanager = new model\blogmanager();


$req_method = $_SERVER["REQUEST_METHOD"];


if($req_method == "POST") {


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

    


    // $isValid =  v::keySet(
    //     v::key(
    //         "post_id",
    //         v::stringType()->notEmpty()
    //     ),
    //     v::key(
    //         "user_id",
    //         v::stringType()->notEmpty()
    //     )
    // )->validate($data);



    // if(!$isValid) {








    // }





}







?>