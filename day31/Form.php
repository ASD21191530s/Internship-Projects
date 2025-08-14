<?php
$servername="localhost";
$username="root";
$password="";
$db="asd";

$conn= mysqli_connect($servername,$username,$password,$db);
if(!$conn)
{
    die("Connection Failed:".mysqli_connect_error());
}
echo("Connected Successfully.<br>");
$name=$_GET['name'];
$email=$_GET['email'];
$phone=$_GET['phone'];
$gender=$_GET['Gender'];
$add=$_GET['address'];
$course=$_GET['course'];
$sql="Insert into form(name,email,phone,gender,address,course)
values('$name','$email','$phone','$gender','$add','$course')";
if(mysqli_query($conn,$sql)){
    echo("New record created successfully");
}
else{
    echo("error:".$sql."<br>".mysqli_error($conn));
}
mysqli_close($conn);
?>