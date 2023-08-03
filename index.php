<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .form-field {
            padding: 1em;
            background-color: pink;
            display: flex;
            align-items: center;
            flex-direction: column;
        }

        select {
            padding: 0.5em;
            font-weight: 900;
            font-family: cursive;
            cursor: pointer;
        }
    </style>
    <title>Dropdown</title>
</head>

<body>
    <div class="formcontainer">
        <div class="form-field">
            State Name :
            <select name="state" id="state" onchange="myfun(this.value)">
                <option value="">-- Select State --</option>
                <option value="Gujarat">Gujarat</option>
                <option value="UP">UP</option>
                <option value="Bihar">Bihar</option>
            </select>
        </div>
        <div class="form-field">
            City Name :
            <select name="state" id="city">
                <option value="" disabled>Select State</option>
            </select>
        </div>
    </div>

    <script>
        function myfun(data) {

            var req = new XMLHttpRequest();
            req.open("GET", "http://localhost/dropdown/request.php?datavalue=" + data, true);
            req.send();

            req.onreadystatechange = function () {
                if (req.readyState == 4 && req.status == 200) {
                    document.getElementById("city").innerHTML = req.responseText;
                }

            }
        }
    </script>
</body>

</html>