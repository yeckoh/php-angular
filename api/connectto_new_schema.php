<?php
function connecttoDB()
{
    $servername = 'localhost';
    $username = 'root';

    // create connection
    $conn = new mysqli($servername, $username);

    // verify connection
    if ($conn->connect_error)
        die(json_encode("could not connect to sql database! " . $conn->connect_error));
    // else
        // echo json_encode("we're connected to sql!");

    return $conn;
}
