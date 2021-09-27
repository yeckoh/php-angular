<?php
	require __DIR__ . '/connectto_new_schema.php';
	$conn = connecttoDB();
	
	// $postdata = file_get_contents("php://input");
	// $req = json_decode($postdata);
	// $id = mysqli_real_escape_string($conn, (int)$_GET['id']);
	$id = 4;
	// $id = mysqli_real_escape_string($conn, trim($req->data->_id));
	
	// $sqlreq = 'UPDATE new_schema.people SET FNAME='.'"'.$fname.'"'.', LNAME='.'"'.$lname.'"'.', ADDR='.'"'.$addr.'"'.', CITY='.'"'.$city.'"'.' WHERE ID='.'"'.$id.'"'.' LIMIT 1;';
	$sqlreq = 'DELETE FROM new_schema.people WHERE ID='.$id.' LIMIT 1;';
	
	if(mysqli_query($conn, $sqlreq)) {
		http_response_code(201); // supposed to be 204 but returns null data
		echo json_encode('SUCCESS');
	}
	else {
		http_response_code(422);
		echo json_encode("Error: " . $sqlreq . "    " . $conn->error);
	}

	mysqli_close($conn);	

	// https://phpenthusiast.com/blog/angular-php-app-httpclientmodule-delete-method
?>

