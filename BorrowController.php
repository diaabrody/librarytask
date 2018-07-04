<?php

include "functions/init.php";

if(!logged_in())
{
	

	$status_login = json_encode(true);

	echo $status_login;

	exit("Not Allowed");


}


if(isset($_GET['id'] ) && $_GET['id'] )
{

	$bookId = $_GET['id'] ; 
	$Book=new Book($conn);
	$Book->borrowBook($bookId);

}


     
          
            




?>