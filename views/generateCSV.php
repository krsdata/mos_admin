<?php

require_once "../db/config.php";
 
$filename = "withdrawdetails_".date("Y-m-d").".csv";
$fp = fopen('php://output', 'w');

header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
// label of the rows
$header_row = array("Username","mobile","email1","email", "password", "status", "create date", "update date", "token", "pan no", "pan name", "pan dob", "paytm", "paytm verify", "bank verify");
fputcsv($fp, $header_row);

   
	$query = "SELECT * FROM user";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_array($result)) {	

		$query1 = "SELECT * FROM API_user_account where usr_id=".$row['email']."";
		$result1 = mysqli_query($conn, $query1);
	

		foreach($result1 as $value1)
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
				$row['token'],
				$value1['usr_pan_number'],
				$value1['usr_pan_name'],
				$value1['usr_pan_dob'],
				$value1['usr_paytm_number'],
				$value1['usr_paytm_isVarified'],
				$value1['usr_bank_isVarified']
			);
			
			fputcsv($fp,$row1,',','"');
		}
	
	}exit;
?>

