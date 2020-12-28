<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php') ?>
</head>
<body> 
	  <!--header-->
	<?php include('include/header.php'); ?>
	<!--content-->
	<div class="content">
		<div class="container">
		<div class="women-in">
		<?php include('include/content-left-sanpham-search.php'); ?>
		<?php include('include/content-right-nam.php'); ?>	
		<?php echo sua loi ?>
	<!--conten-down-->
	<?php include('include/content-down.php'); ?>
	<!---->
	<?php include('include/footer.php'); ?>
</body>
</html>