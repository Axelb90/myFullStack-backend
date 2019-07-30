<?php
    require 'database.php';

    //GET the posted data
    $postdata = file_get_contents("php://input");

    if(isset($postdata) && !empty($postdata)){
        //Extract the data
        $request = json_decode($postdata);

        //Validate
        if(trim($request->title) === '' || (float)$request->taskState == null){
            return http_response_code(400);
        }


        //Sanitize
        $title = mysqli_real_escape_string($con,trim($request->title));
        $taskState = mysqli_real_escape_string($con, (int)$request->taskState);

        //Create

        $sql = "INSERT INTO `tasks`(`id`,`title`,`taskState`) VALUES (null, '{$title}','{$taskState}')";

        if(mysqli_query($con,$sql)){
            http_response_code(201);
            $task = [
                'title' => $title,
                'taskState' => $taskState,
                'id' => mysqli_insert_id($con)
            ];
            echo json_encode($task);
        }
        else{
            http_response_code(422);
        }
    }
?>