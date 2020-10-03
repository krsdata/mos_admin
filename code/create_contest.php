<?php
require_once "../db/config.php";
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST" && $_SESSION["username"] != ""){
 
        $amount 	 = trim($_POST["amount"]);
        $no_of_teams = trim($_POST["no_of_teams"]);
        $fee 		 = trim($_POST["fee"]);
        $repeat1 	 = trim($_POST["repeat1"]);
        $fill1 		 = trim($_POST["fill1"]);
        $multi 		 = trim($_POST["multi"]);
        $type 		 = trim($_POST["type"]);
        $link 		 = trim($_POST["link"]);
    
		$qry = "INSERT INTO `contests1`(`amount`, `no_of_teams`, `fee`, `repeat1`, `fill1`, `multi`, `type`) VALUES ('$amount','$no_of_teams','fee','$repeat1','$fill1','$multi','$type')";		
		mysqli_query($conn,$qry);
		$_SESSION['TYPE'] = "2";
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