<?php

// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Check connection
if(!$conn)
{

    die("Connection failed: " . mysqli_connect_error());
}



function query($query)
{

global $conn ;

return mysqli_query($conn, $query);


}

function escape($string)   // prevent sql injection
{
	global $conn ;

	return mysqli_real_escape_string($conn , $string );


}
