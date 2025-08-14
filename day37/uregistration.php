<?php
include("connect.php");
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = $_POST['email'];
    $address = $_POST['address'];
    $aadhar = $_POST['aadhar'];

    if (!empty($uname) && !empty($phone) && !empty($email) && !empty($address) && !empty($aadhar)) {
        $sql = "INSERT INTO userreg (username, phone, email, address, aadhar)
                VALUES ('$uname', '$phone', '$email', '$address', '$aadhar')";
        if (mysqli_query($conn, $sql)) {
            $success = "Registration Successful";
        } else {
            $error = "Error: " . mysqli_error($conn);
        }
    } else {
        $error = "Please enter all data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right, #2193b0, #6dd5ed);
        }
        .cont {
            border-radius: 6px;
            padding: 20px;
            width: 300px;
            background-color: white;
            box-shadow: 20px 20px 20px black;
        }
        label {
            font-size: larger;
            font-weight: bold;
        }
        input, textarea {
            width: 100%;
            margin-bottom: 10px;
            height: 3vh;
        }
        button {
            background-color: lightblue;
            border-radius: 10px;
            height: 4vh;
            margin-left: 40%;
        }
        .message {
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="cont">
        <?php if ($error) echo "<p class='message' style='color:red;'>$error</p>"; ?>
        <?php if ($success) echo "<p class='message' style='color:green;'>$success</p>"; ?>
        <form method="POST" action="">
            <h1 align="center" style="text-shadow: 2px 2px 4px grey; color:grey;">User Registration</h1>
            
            <label>Full Name</label><br>
            <input type="text" name="name" required><br>

            <label>Phone No</label><br>
            <input type="text" name="phone" required><br>

            <label>Email Address</label><br>
            <input type="email" name="email" required><br>

            <label>Address</label><br>
            <textarea name="address" required></textarea><br>

            <label>Aadhar Number</label><br>
            <input type="text" name="aadhar" required><br>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
