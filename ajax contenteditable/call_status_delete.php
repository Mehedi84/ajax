<?php
include '../libs/database.php';
include '../libs/functions.php';

$user_del_id = (int) $_REQUEST['user_dlt_id'];
$sql = "UPDATE divisions SET status=0 WHERE id='$user_del_id'";
$result_del_uer =  mysql_query($sql);
if(mysql_affected_rows() > 0){
    echo "Call Status deleted successfully...";
}else{
    echo "Call Status delete failed...";
}