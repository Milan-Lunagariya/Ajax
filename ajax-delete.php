<?php
    $student_id = $_POST['id'];

    $con = mysqli_connect("localhost","root","","ajax") or die("Connetcion Faild");
    $sql = "DELETE FROM student WHERE id = {$student_id} ";
    
   if(mysqli_query($con,$sql)){
        echo 1;
   }
   else {
        echo 0;
   }

?>