<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once __DIR__ . "/../util/autoloader.php";
$blogmanager = new model\blogmanager();

$imagemanager = new model\imagemanager();


$req_method = $_SERVER["REQUEST_METHOD"];
$res = array("msg"=>" ");


if($req_method == "POST") {

    $token_data = array();

    $header = apache_request_headers();


    if (isset($header["Authorization"])) {
        $token = $header["Authorization"];
        $decoded_data  = json_decode(Token::verify_token($token), true);
        $token_data = $decoded_data;
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
       

    $data = $_FILES["file"];
    

    $result = $imagemanager->file_upload($_FILES, $token_data["data"]["id"]);
   


    if($result) {
       
        echo json_encode($result);
    }else {
       
        $res = array("msg"=>$imagemanager->get_error());
        echo json_encode($res);
    }


}








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

  
?>