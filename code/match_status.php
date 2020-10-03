<?php
require_once "../db/config.php";
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST" && $_SESSION["username"] != ""){
 
        $match_id = trim($_POST["match_id"]);
        $match_status = trim($_POST["match_status"]);
        $link = trim($_POST["link"]);
    
		$qry = "UPDATE `api_matches` SET `mat_status` = '$match_status' WHERE `mat_id` = '$match_id' ";		
		mysqli_query($conn,$qry);
		$_SESSION['TYPE'] = "1";
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