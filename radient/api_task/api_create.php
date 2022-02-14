<?php
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin:*");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,Access-Control-Allow-Methods, Authorization");

    $data = json_decode(file_get_contents("php://input"), true);

    $qstn = $data["question"];
    $choice1 = $data["choice1"];
    $choice2 = $data["choice2"];
    $choice3 = $data["choice3"];

    require_once "config.php";
    
    $qstn_insert_q = "insert into questions(question,created_at) values('$qstn',now())";
    
    if(mysqli_query($conn,$qstn_insert_q) or die("Qstn insert failed"))
    {    
        echo json_encode(array("message"=>"Question Inserted.","status"=>true));
        
        $qstn_fetch = "select * from questions where question='$qstn'"; 
        $qstn_fetch_res = mysqli_query($conn,$qstn_fetch) or die("Select Qstn failed");

        if (mysqli_num_rows($qstn_fetch_res) > 0) 
        {
            while($row = mysqli_fetch_assoc($qstn_fetch_res)) 
            {
              $qid = $row["id"];
            }
        } 

        $choices_insert_q1 = "insert into choices(question_id,options,created_at) values('$qid','$choice1',now())";
        if(mysqli_query($conn,$choices_insert_q1) or die("Option 1 insert failed"))
            echo json_encode(array("message"=>"Option 1 Inserted.","status"=>true));
        else
            echo json_encode(array("message"=>"Option 1 Insertion Failed.","status"=>false));

        $choices_insert_q2 = "insert into choices(question_id,options,created_at) values('$qid','$choice2',now())";
        if(mysqli_query($conn,$choices_insert_q2) or die("Option 1 insert failed"))
            echo json_encode(array("message"=>"Option 2 Inserted.","status"=>true));
        else
            echo json_encode(array("message"=>"Option 2 Insertion Failed.","status"=>false));

        $choices_insert_q3 = "insert into choices(question_id,options,created_at) values('$qid','$choice3',now())";
        if(mysqli_query($conn,$choices_insert_q3) or die("Option 1 insert failed"))
            echo json_encode(array("message"=>"Option 3 Inserted.","status"=>true));
        else
            echo json_encode(array("message"=>"Option 3 Insertion Failed.","status"=>false));


    }
    else
        echo json_encode(array("message"=>"Question Insertion Failed.","status"=>false));
?>