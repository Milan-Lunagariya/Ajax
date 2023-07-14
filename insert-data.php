<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
    <style>
        body {
            background-color: lightcyan;
            margin: 0;
            padding: 0;

        }

        #error-message {
            /* position: absolute; */
            color: red;
            font-weight: 900;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            /* background-color: lightcoral; */
        }

        #success-message {
            /* position: absolute; */
            color: Green;
            font-weight: 900;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            /* background-color: greenyellow; */
        }

        th {
            background-color: lightblue;
        }

        .edit-btn {
            background-color: blue;
            color: azure;
            border-radius: 7px;
            cursor: pointer;
            padding: 5px 11px;
        }

        .delete-btn {
            background-color: red;
            color: white;
            border: 0;
            padding: 4px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        #model {
            background-color: rgb(0, 0, 0, 0.8);
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            color: white;
            z-index: 100;
            padding: 8em 0em;
            /* display: flex;
            justify-content: center; */
            display: none;
        }

        #model-form {
            /* background-color: #fff;
            width : 30%;
            position : relative;
            top :20%;
            left : calc(50%-15%);
            padding: 15px;
            border-radius: 4px;
            display: flex;
            justify-content: center; */

            /* background-color: #fff; */
            background-image: url('black.jpeg');
            width: 34%;
            border-radius: 1em;
            padding: 2em 2em;
            margin: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        #model-form input:focus-visible {
            outline: 2px solid crimson;
            border-radius: 5px;
            font-weight: 900;
        }
        #model-form h2{
            border-bottom: 1px solid whitesmoke;
        }

        #close-btn {
            cursor: pointer;
            background: red;
            width: 10%;
            display: flex;
            justify-content: center;
            border: 2px dotted lightseagreen;
            border-radius: 50%;
            font-weight: 900;
            font-family: sans-serif;
            padding: 0.1em;
            /* margin: -3em -2em; */
        }
       
    </style>
</head>

<body>

    <form action="" method="post" id="addForm">
        <table border="3" align="center" cellpadding="10" cellspacing="0">
            <tr>
                <td>
                    First name : <input type="text" name="fname" id="fname">
                </td>
                <td>
                    Last Name : <input type="text" name="lname" id="lname">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" id="save-button" value="save-button">
                </td>
            </tr>
            <tr>
                <td bgcolor="pink" colspan="2" align="center">
                    Message :
                    <div id="error-message"></div>
                    <div id="success-message"></div>
                </td>
            </tr>
        </table>
    </form>
    <hr>
    <table id="table-data" border="3" align="center" cellpadding="15" cellspacing="0">
        <tr>
            <th>id</th>
            <th>Fname</th>
            <th>Lname</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Milan</td>
            <td>Lunagariya</td>
        </tr>
    </table>

    <div id="model">
        <div id="model-form">
              <table cellpadding='8' border='0' width='50px'>

            </table>
            <!-- Fname : <input type="text" name="" id="edit-fname">
            Lname : <input type="text" name="" id="edit-lname"> -->
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"> </script>

    <script>
        $(document).ready(function () {
            //Load table records on page load
            function loadTable() {
                $.ajax({
                    url: "ajax-load.php",
                    type: "POST",
                    success: function (data) {
                        $("#table-data").html(data);
                    }
                })
            }
            loadTable();

            //Insert new Records
            $("#save-button").on("click", function (e) {
                e.preventDefault();
                var fname = $("#fname").val();
                var lname = $("#lname").val();

                if (fname == "" || lname == "") {
                    $("#error-message").html("All Fileds are Required").slideDown();
                    $("#success-message").slideUp();
                }
                else {
                    $.ajax({
                        url: "ajax-insert.php",
                        type: "POST",
                        data: { first_name: fname, last_name: lname },
                        success: function (data) {
                            if (data == 1) {
                                loadTable();
                                $("#addForm").trigger("reset");
                                $("#success-message").html("Data Inserted Successfully").slideDown();
                                $("#error-message").slideUp();
                            } else {
                                // loadTable();
                                $("#error-message").html("Can't save Record").slideDown();
                                $("#success-message").slideUp();
                            }
                        }
                    })

                }

            })

            // Delete Records
            $(document).on('click', ".delete-btn", function () {
                if (confirm("Do you really want to this Record ?")) {

                    var studentId = $(this).data("id");
                    element = this;
                    $.ajax({
                        url: 'ajax-delete.php',
                        type: "POST",
                        data: { id: studentId },
                        success: function (data) {
                            if (data == 1) {
                                $(element).closest("tr").fadeOut();
                            } else {
                                $("#error-message").html("Can't Delete Record").slideDown();
                                $("#success-message").slideUp();
                            }
                        }
                    })
                }


            })

            //show model box
            $(document).on("click", ".edit-btn", function () {
                $("#model").show();
                var studentId = $(this).data("eid");
                // alert(studentId);
                $.ajax({
                    url : 'load-update.php',
                    type : 'POST',
                    data : {id:studentId},
                    success :function(data){
                        $("#model-form table").html(data);
                    }
                });

            })
            //Hide model box
            $("#close-btn").on("click" , function(){
                $("#model").hide();
            })

            
        })


    </script>
</body>

</html>