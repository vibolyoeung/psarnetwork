<?php
error_reporting(0);
header("Content-Type: text/html");
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Origin: *');

    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'psarnetwork_db';

    //connect with the database
    $conn = mysql_connect($dbHost,$dbUsername,$dbPassword);
    mysql_select_db($dbName,$conn);
    mysql_set_charset('utf8',$conn);
    //get matched data from skills table
    $query = mysql_query("SELECT title,created_date FROM product ORDER BY title ASC");
    $data = array();
    while ($row = mysql_fetch_assoc($query)) {
        $data[date("Y-m-d",strtotime($row['created_date']))] = $row['title'];
    }
	 echo json_encode($data);
?>
