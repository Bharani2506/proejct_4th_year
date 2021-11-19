<?php
session_start();

if(isset($_SESSION['employeeId'])) {
	session_destroy();
	unset($_SESSION['employeeId']);
	unset($_SESSION['employeeName']);
	header("Location: index.php");
} else {
	header("Location: index.php");
}
?>