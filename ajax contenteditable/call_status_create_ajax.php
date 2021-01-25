<?php

include '../libs/database.php';
include '../libs/functions.php';

$call_status = $_POST['call_status'];
// $sql = ltrim($_REQUEST['sql']);

    $resultdata = mysql_num_rows(mysql_query("SELECT * FROM divisions WHERE name ='".$call_status."'"));
 if ($resultdata) {
        echo "Invalid";
    } else {
        $sql = "INSERT INTO divisions (name) VALUES ('$call_status')";
        $result = mysql_query($sql);
        if($result){
            echo 'Call Status added successfully!!!';
        }else{
            echo "Call Status Not Insert";
        }
    }


        
    
?>
