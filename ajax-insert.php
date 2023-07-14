<?php 

    $con = mysqli_connect("localhost","root","","ajax") or die("Connetcion Faild");
    
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
 
    $sql = "INSERT INTO `student`(fname,lname) VALUES ('{$first_name}', '{$last_name}')";
    // $res = mysqli_query($con,$sql) or  die("SQL Query Failed.");

    // echo $sql;

    if(mysqli_query($con,$sql)){
        echo 1;
    }else{
        echo 0;
    }

?>