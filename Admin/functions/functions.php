<?php
//This function file hold all functions

//making connection to database
$conn = mysqli_connect("localhost","root","","Ebusiness")or die(mysqli_error());


function Categories(){
	//Categories function is use to bring Categories data from database dynamically
	global $conn;
	$query = mysqli_query($conn,"select * from category"); // to select all record from categoy table
	while($row = mysqli_fetch_array($query)){
	$id = $row['cat_id'];
	$title = $row['cat_title'];
	echo "<option value='$id'>$title</option>";
		
	}
			
	
	
	} 



function Brands(){
	//Brands function is use to bring Brands data from database dynamically
	global $conn;
	$query = mysqli_query($conn,"select * from brand"); // to select all record from categoy table
	while($row = mysqli_fetch_array($query)){
	$id = $row['brand_id'];
	$title = $row['brand_title'];
	echo "<option value='$id'>$title</option>";
		
	}
			
	
	
	} 

?>