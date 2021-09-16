<?php
    $servername = 'localhost';
    $username = 'root';

    // create connection
    $conn = new mysqli($servername, $username);

	$sqlreq = "SELECT * FROM new_schema.people;";
	$result = $conn->query($sqlreq);
	$people = [];
	if ($result->num_rows > 0) {
		$cr = 0;
		while ($row = $result->fetch_assoc()) {
			$people[$cr]['_id'] = $row['ID'];
			$people[$cr]['fname'] = $row['FNAME'];
			$people[$cr]['lname'] = $row['LNAME'];
			$people[$cr]['addr'] = $row['ADDR'];
			$people[$cr]['city'] = $row['CITY'];
			$people[$cr]['img'] = $row['IMG'];
			$cr++;
//			echo '<tr><td>' . $row["ID"] . "</td><td>" . $row["FNAME"] . "</td><td>" . $row["LNAME"] . "</td><td>" . $row["ADDR"] . "</td><td>" . $row["CITY"] . "</td>";
//			echo '</td><td>' . $row["IMG"] . '</td>';
//			echo '</tr>';
		}
	echo json_encode($people);
	}
	else
		http_response_code(404);
	
?>

