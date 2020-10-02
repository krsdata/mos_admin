<?php

require_once "../db/config.php";
 
$filename = "withdrawdetails_".date("Y-m-d").".csv";
$fp = fopen('php://output', 'w');

header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
// label of the rows
$header_row = array("Username","mobile","email1","email", "password", "status", "create date", "update date", "token");
fputcsv($fp, $header_row);

   

		$query1 = "SELECT * FROM user";
		$result1 = mysqli_query($conn, $query1);
	

		foreach($result1 as $row)
		{
			// Array indexes correspond to the field names in your db table(s)
			$row1 = array(
				$row['username'],
				$row['mobile'],
				$row['email1'],
				$row['email'],
				$row['password'],
				$row['status'],
				$row['createdate'],
				$row['updatedate'],
				$row['token']
			);
			
			fputcsv($fp,$row1,',','"');
		}
	
	exit;
?>

