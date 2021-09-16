<?php
	// header("Access-Control-Allow-Origin: *");
	if($_POST){
	require __DIR__ . '/connectto_new_schema.php';
	$conn = connecttoDB();
	
	
	$fname = '"garry"';
	$lname = '"nooman"';
	$addr = '"gm_flatgrass"';
	$city = '"facepunchstoodio"';
	
	$sqlreq = 'INSERT INTO new_schema.people (FNAME, LNAME, ADDR, CITY)
	VALUES (' . $fname . ',' . $lname . ',' . $addr . ',' . $city . ');';
	$result = $conn->query($sqlreq);

    if ($result)
        echo json_encode("success!");
    else
        echo json_encode("Error: " . $sqlreq . "<br>" . $conn->error);
	}
	else
		echo json_encode("get rekt");
?>

