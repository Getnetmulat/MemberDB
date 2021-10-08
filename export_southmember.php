<?php
    $host="localhost";
    $username="Getnet";
    $password="Getnet23";
    $dbname="eprdf_mdb";
    $con = new mysqli($host, $username, $password,$dbname); 
    $con->query("SET NAMES 'utf8'");

        $sql_data="select * from member where Party ='SOUTH' or party ='ደቡብ' ORDER BY ID";
        $result_data=$con->query($sql_data);
        $results=array();
    $filename = "All South Member Data.xls"; // File Name
    // Download file
    header("Content-Disposition: attachment; filename=\"$filename\"");
    header("Content-Type: application/vnd.ms-excel");

    $flag = false;
    while ($row = mysqli_fetch_assoc($result_data)) {
        if (!$flag) {
            // display field/column names as first row
            echo implode("\t", array_keys($row)) . "\r\n";
            $flag = true;
        }
        echo implode("\t", array_values($row)) . "\r\n";
    }
    ?>