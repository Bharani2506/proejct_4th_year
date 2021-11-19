<?php
session_start();

if(isset($_SESSION['companyId'])) {
	session_destroy();
	unset($_SESSION['companyId']);
	unset($_SESSION['companyName']);
	header("Location: index.php");
} else {
	header("Location: index.php");
}
?>