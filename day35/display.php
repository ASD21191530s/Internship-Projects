<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "asd";

$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

$sql = "SELECT  name, email, phone, gender, address, course FROM form";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo  " | Name: " . $row["name"] . " | Email: " . $row["email"] . 
             " | Phone: " . $row["phone"] . " | Gender: " . $row["gender"] . 
             " | Address: " . $row["address"] . " | Course: " . $row["course"] . "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
