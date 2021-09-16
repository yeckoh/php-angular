<?php
	require __DIR__ . '/connectto_new_schema.php';
	$conn = connecttoDB();
	
	$postdata = file_get_contents("php://input");
	$req = json_decode($postdata);

	$fname = $req->data->fname;
	$lname = $req->data->lname;
	$addr = $req->data->addr;
	$city = $req->data->city;
	
	$sqlreq = "INSERT INTO new_schema.people (`FNAME`,`LNAME`,`ADDR`, `CITY`)
	VALUES ('{$fname}','{$lname}','{$addr}','{$city}')";

	$result = $conn->query($sqlreq);
    if ($result)
        echo json_encode("success!");
    else
        echo json_encode("Error: " . $sqlreq . "<br>" . $conn->error);


	// this currently produces two new records, one as intended and another thats completely empty
?>

