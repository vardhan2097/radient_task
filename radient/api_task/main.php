<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin:*");

require_once("config.php");

$qstn_q = "select * from questions";
$qstn_res = mysqli_query($conn,$qstn_q) or die("Question Query Failed!!");
$count_q = mysqli_num_rows($qstn_res);

while($q_row = mysqli_fetch_assoc($qstn_res)) 
{
    $qid = $q_row["id"];
    $question = $q_row["question"];
    $creation_dt = $q_row["created_at"];
    
    echo json_encode(array("text"=>"$question","created_at"=>"$creation_dt"));
    
    $choices_fetch = "select * from choices where question_id = '$qid'";
    $choice_fetch_res = mysqli_query($conn,$choices_fetch) or die("Select Qstn failed");
    if (mysqli_num_rows($choice_fetch_res) > 0) 
    {
        while($c_row = mysqli_fetch_assoc($choice_fetch_res)) 
        {
            $option = $c_row["options"];
            echo json_encode(array("text"=>"$option"));
        }
    }
}
/*
if($count_q > 0)
{
    $qstn_row = mysqli_fetch_all($qstn_res, );
    echo json_encode($qstn_row);

    $qstn_fetch = "select * from questions where question='$qstn'"; 
    $qstn_fetch_res = mysqli_query($conn,$qstn_fetch) or die("Select Qstn failed");

    $qstn_fetch_res = mysqli_query($conn,$qstn_fetch) or die("Select Qstn failed");

 
    
    if (mysqli_num_rows($qstn_fetch_res) > 0) 
    {
        while($q_row = mysqli_fetch_assoc($qstn_fetch_res)) 
        {
            $qid = $q_row["id"];
       
            $choices_fetch = "select * from choices where question_id = '$qid'";
            $choice_fetch_res = mysqli_query($conn,$choices_fetch) or die("Select Qstn failed");
            if (mysqli_num_rows($choice_fetch_res) > 0) 
            {
                while($c_row = mysqli_fetch_assoc($choice_fetch_res)) 
                {
                    $option = $c_row["options"];
                    echo json_encode($option);
                }
            }
        }
    } 
}
else
{
    echo json_encode(array("message"=>"No Questions in Table","status"=>false));
}/*

?>