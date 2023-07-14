<?php 
    $con = mysqli_connect("localhost","root","","ajax") or die("Connetcion Faild");
    $sql = "SELECT * FROM student";
    $res = mysqli_query($con,$sql) or  die("SQL Query Failed.");


    if(mysqli_num_rows($res) > 0)
    {
        $output = '<table border="5" cellpadding="0" cellspacing="0" align="center">
                        <tr>
                            <th width="100px">Id</th>
                            <th>Full Name</th>
                            <th width="100px">Edit</th>
                            <th width="100px">Delete</th>
                        </tr> ';

                while($row = mysqli_fetch_assoc($res))
                {
                    $output .= "<tr>
                                    <td>{$row["id"]}</td>
                                    <td> {$row["fname"]}  {$row["lname"]}</td>
                                    <td><button class='edit-btn' data-eid='{$row["id"]}'>Edit</td>
                                    <td><button class='delete-btn' data-id='{$row["id"]}'>Delete</td>
                                </tr>";
                }

                

               
        $output .= "</table>";

        mysqli_close($con);
        echo $output;
        
    }else{
        "<H2><No Data Found/H2>";
    }
?>