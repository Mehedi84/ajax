<?php

include '../libs/database.php';
include '../libs/functions.php';

$user_id = (int) $_REQUEST['user_id'];
$user_data = $_REQUEST['user_data'];
$updateable_filed = $_REQUEST['updateable_filed'];
$sql = "UPDATE `divisions` SET ".$updateable_filed." = '" . $user_data . "' WHERE `id` = " . $user_id;

$result_update_password = mysql_query($sql);
if (mysql_affected_rows() > 0) {
    echo "Updated successfully...";
} else {
    echo "Updated failed...";
}

