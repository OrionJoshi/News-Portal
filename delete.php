<?php

	include('db/connection.php');

	$id=$_GET['del'];
	$query = mysqli_query($conn,"DELETE FROM category WHERE id = '$id'");

	if($query){

		echo "<script>alert('Category Deleted');</script>";
      echo "<script>window.location='http://localhost/news/category.php';</script>";
	}else{

		echo "<script>alert('Please , Try Again!');</script>";
				header('location:category.php');

	}
	

?>