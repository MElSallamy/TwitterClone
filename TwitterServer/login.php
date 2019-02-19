<?php

 // connect to db
require("DBInfo.php");
 
 // define query 
$query= "select * from login where email= '". $_GET['email'] ."' and password= '". $_GET['password']."'";  // $usename=$_GET['username'];

$result=  mysqli_query($connect, $query);

if(! $result)
{ die("Error in query");}

 //get data from database
 $output=array();
 
while($row=  mysqli_fetch_assoc($result))
{
 $output[]=$row;  //$row['id']
 
 
 break; // to be only safe one user 
}

 if ($output) {
	 
print( "{'msg':'Pass Login'". ",'info':'". json_encode($output) ."'}");  // this will print the output in json
 
 }
 else{
 	print("{'msg':' cannot login'}");
 }

//  clear
mysqli_free_result($result);

// close connection
mysqli_close($connect);
?>