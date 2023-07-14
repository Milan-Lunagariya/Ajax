<?php

$studentId = $_POST['id'];


$con = mysqli_connect("localhost", "root", "", "ajax") or die("Connetcion Faild");

// $first_name = $_POST["first_name"];
// $last_name = $_POST["last_name"];

$sql = "SELECT * FROM `student` WHERE `id`='$studentId'";
$res = mysqli_query($con, $sql);




$output = "";

    if(mysqli_num_rows($res) > 0) {

        while($row = mysqli_fetch_assoc($res))
        {
                $output .= "
            <div id='close-btn'>
                X
            </div>

            <h2>Edit Form</h2>
                <tr>
                    <td>First Name :
                        <input type='text'  id='edit-fname' value='{$row["fname"]}'>
                    </td>
                </tr>
                <tr>
                    <td>Last Name :
                        <input type='text'  id='edit-lname' value='{$row["lname"]}'>
                    </td>
                </tr>
                <tr align='right'>
                    <!-- <td></td> -->
                    <td>
                        <input type='submit'  id='edit-submit' value='Save'>
                    </td>
                </tr>";
            
        }
    }
    else {
        echo "<h2>No Record Found</h2>";
    }


?>


<!-- <h2>Edit Form</h2>

<table cellpadding="8" border="0" width="50px">
    <tr>
        <td>First Name :
            <input type="text" name="" id="edit-fname" value='{$row["name"]}'>
        </td>
    </tr>
    <tr>
        <td>Last Name :
            <input type="text" name="" id="edit-lname" value='{$row["name"]}'>
        </td>
    </tr>
    <tr align="right">
        <!-- <td></td> -->
        <td><input type="submit" name="" id="edit-submit" value="Save"></td value='{$row["name"]}'>
    </tr>
</table> -->