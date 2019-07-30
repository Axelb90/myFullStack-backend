<?php

    //Retunrs the list of polices
    require 'database.php';

    $tasks = [];
    $sql = "SELECT id, title, taskState FROM tasks";

    if($result = mysqli_query($con,$sql)){
        $i = 0;
        while($row  = mysqli_fetch_assoc($result)){
            $tasks[$i]['id'] = $row['id'];
            $tasks[$i]['title']= $row['title'];
            $tasks[$i]['taskState'] = $row['taskState'];
            $i++;
        }

        echo json_encode($tasks);
    }
    else{
        http_response_code(404);
    }
?>
