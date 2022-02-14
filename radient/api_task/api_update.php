<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin:*");
    header("Access-Control-Allow-Methods: PUT");
    header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,Access-Control-Allow-Methods, Authorization");

    $data = json_decode(file_get_contents("php://input"), true);

    $q_id = $data['id'];
    $qstn = $data['question'];

    $choice_1 = $data['choice1'];
    $choice_2 = $data['choice2'];
    $choice_3 = $data['choice3'];
    
    require_once("config.php");

    $qstn_q = "update questions set question='$qstn' where id='$q_id'";

    if(mysqli_query($conn,$qstn_q) or die("Qstn update failed"))
    {   
        echo json_encode(array("message"=>"Question Updated.","status"=>true));
        
        $choice_q1 = "update choices set options='$choice_1' where question_id='$q_id'";

        if(mysqli_query($conn,$choice_q1))
            echo json_encode(array("message"=>"Option1 Updated.","status"=>true));
        else
            echo json_encode(array("message"=>"Option1 Updation Failed.","status"=>false));

        $choice_q2 = "update choices set options='$choice_2' where question_id='$q_id'";
        
        if(mysqli_query($conn,$choice_q2))
            echo json_encode(array("message"=>"Option2 Updated.","status"=>true));
        else    
            echo json_encode(array("message"=>"Option2 Updation Failed.","status"=>false));
    
        $choice_q3 = "update choices set options='$choice_3' where question_id='$q_id'";
        if(mysqli_query($conn,$choice_q3))
            echo json_encode(array("message"=>"Option3 Updated.","status"=>true));
        else    
            echo json_encode(array("message"=>"Option3 Updation Failed.","status"=>false));
    }
    else
        echo json_encode(array("message"=>"Question Updation Failed.","status"=>false));


    
    
?>