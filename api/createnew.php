<?php
	require __DIR__ . '/connectto_new_schema.php';
	$conn = connecttoDB();
	
	$postdata = file_get_contents("php://input");
	// echo json_encode($postdata);
	// if(isset($postdata) && !empty($postdata)) {
		$req = json_decode($postdata);
		// echo json_encode($req);
		// if(empty($req)) {
		// 	http_response_code(422);
		// 	echo json_encode("Error: postdata was not set or was empty!");
		// 	mysqli_close($conn);
		// 	exit();
		// 	return;
		// }
		$fname = mysqli_real_escape_string($conn, trim($req->data->fname));
		$lname = mysqli_real_escape_string($conn, trim($req->data->lname));
		$addr = mysqli_real_escape_string($conn, trim($req->data->addr));
		$city = mysqli_real_escape_string($conn, trim($req->data->city));
		$sqlreq = 'INSERT INTO new_schema.people (FNAME, LNAME, ADDR, CITY) VALUES ("' . $fname . '","' . $lname . '","' . $addr . '","' . $city . '");';
		// $sqlreq = "INSERT INTO `new_schema.people` (`FNAME`, `LNAME`, `ADDR`, `CITY`) VALUES ('{$fname}','{$lname}','{$addr}','{$city}');";
	
		// if ($conn->query($sqlreq)) {
		if(mysqli_query($conn, $sqlreq)) {
			http_response_code(201);
			echo json_encode("success! ". $sqlreq);
		}
		else {
			http_response_code(503);
			echo json_encode("Error: " . $sqlreq . "    " . $conn->error);
		}
	
		mysqli_close($conn);	
	// }
	// else {
	// 	http_response_code(422);
	// 	echo json_encode("Error: postdata was not set or was empty!");
	// }



	// this currently produces two new records, one as intended and another thats completely empty

	// https://phpenthusiast.com/blog/angular-php-app-creating-new-item-with-httpclient-post
?>

