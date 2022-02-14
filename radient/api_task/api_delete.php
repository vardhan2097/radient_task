<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin:*");
    header("Access-Control-Allow-Methods: DELETE");
    header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,Access-Control-Allow-Methods, Authorization");

    $data = json_decode(file_get_contents("php://input"),true);

    echo $q_id = $data['id'];

    require_once("config.php");

    echo $del_q = "delete from questions where id = '$q_id'";
    if(mysql_query($conn,$del_q) or die("Delete Q Failed"))
    {    
        echo json_encode(array("message"=>"Question Deleted.", "status"=>true));
        
        echo $del_c = "delete from choices where question_id = '$q_id'";
        
        if(mysql_query($conn,$del_c) or die("Delete Q Failed"))
            echo json_encode(array("message"=>"Choices Deleted.", "status"=>true));
        else
            echo json_encode(array("message"=>"Choices Deletion Failed.", "status"=>false));
    }
    else    
        echo json_encode(array("message"=>"Question Deletion Failed.", "status"=>false));
?>