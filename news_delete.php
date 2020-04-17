<?php

	include('db/connection.php');

	$id = $_GET['delete'];

	$query = mysqli_query($conn,"DELETE FROM news WHERE id = '$id'");

	if($query){
		echo "<script> alert('News Deleted Sucessfully!');</script>";
            echo "<script>window.location='http://localhost/news/news.php';</script>";

    }else{

            echo "<script> alert('Please Try Agian!');</script>";
	}



?>