<?php
	require __DIR__ . '/connectto_new_schema.php';
	$conn = connecttoDB();
	
	$postdata = file_get_contents("php://input");
	$req = json_decode($postdata);

	$id = mysqli_real_escape_string($conn, trim($req->data->_id));
	$fname = mysqli_real_escape_string($conn, trim($req->data->fname));
	$lname = mysqli_real_escape_string($conn, trim($req->data->lname));
	$addr = mysqli_real_escape_string($conn, trim($req->data->addr));
	$city = mysqli_real_escape_string($conn, trim($req->data->city));
	
	$sqlreq = 'UPDATE new_schema.people SET FNAME='.'"'.$fname.'"'.', LNAME='.'"'.$lname.'"'.', ADDR='.'"'.$addr.'"'.', CITY='.'"'.$city.'"'.' WHERE ID='.'"'.$id.'"'.' LIMIT 1;';
	
	if(mysqli_query($conn, $sqlreq)) {
		http_response_code(201); // supposed to be 204 but returns null data
		echo json_encode('SUCCESS');
	}
	else {
		http_response_code(422);
	}

	mysqli_close($conn);	

	// https://phpenthusiast.com/blog/angular-php-app-update-existing-record-with-put
?>

