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
$name=$_GET['uname'];
$p=$_GET['pass'];
$sql="Insert into login(Username,Password)
values('$name','$p')";
if(mysqli_query($conn,$sql)){
    echo("New record created successfully");
}
else{
    echo("error:".$sql."<br>".mysqli_error($conn));
}
mysqli_close($conn);
?>