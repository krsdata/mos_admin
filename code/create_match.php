<?php
require_once "../db/config.php";
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST" && $_SESSION["username"] != ""){
 
        $match_id = trim($_POST["match_id"]);
        $mat_startdate = trim($_POST["mat_startdate"]);
        $mat_enddate = trim($_POST["mat_enddate"]);
        $link = trim($_POST["link"]);
    
		$qry = "UPDATE `api_matches` SET `mat_startdate` = '$mat_startdate', `mat_enddate` = '$mat_enddate' WHERE `mat_id` = '$match_id' ";		
		mysqli_query($conn,$qry);
		$_SESSION['TYPE'] = "4";
		mysqli_close($conn);
		header("location: ../views/".$link);
		exit;
    
    
}else
	{
		$_SESSION['TYPE'] = "0";
		header("location: ../views/".$link);
		exit;
	}
?>