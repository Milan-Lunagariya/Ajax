<?php 
    $data = $_GET['datavalue'];

    $gujarat = array('Rajkot','Junagadh');
    $up = array('Gorkhpur','Laknow');
    $bihar = array('Patana','Kishangadh');

    if($data == 'Gujarat'){
        foreach($gujarat as $cityGuj){
            echo "<option> $cityGuj </option>";
        }
    }
    if($data == 'UP'){
        foreach($up as $cityUp){
            echo "<option> $cityUp </option>";
        }
    }
    if($data == 'Bihar'){
        foreach($bihar as $cityBihar){
            echo "<option> $cityBihar </option>";
        }
    }
?>