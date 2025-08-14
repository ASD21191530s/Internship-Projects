<?php
$servername="localhost";
$username="root";
$password="";
$db="pet clinic";

$conn= mysqli_connect($servername,$username,$password,$db);
if(!$conn)
{
    die("Connection Failed:".mysqli_connect_error());
}
echo("Connected Successfully.<br>");
$sql="Insert into owner(Oid,Oname,Oaddress,Oemail,Ophoneno)
values(1,'Atharva','Kalyan','atharvadhore71@gmail.com','9011146085')";
if(mysqli_query($conn,$sql)){
    echo("New record created successfully");
}
else{
    echo("error:".$sql."<br>".mysqli_error($conn));
}
mysqli_close($conn);
?>