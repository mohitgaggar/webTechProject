<?php
session_start();
include ('headerp.php');
include ('header.php');
if(!isset($_SESSION['user_name']))
{
	header("location: index.php");
}
?>

<html>
<head>
	<title>Edit account settings</title>
			<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
