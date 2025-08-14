<?php
$server="localhost";
$db="ASD";
$user="root";
$pass="";
$conn=mysqli_connect($server,$user,$pass,$db);
if(!$conn)
{
    die("connection Failed".mysqli_connect_error());
}
echo("Connected Successfully.<br>");
$sql="Create table customer(
    Custid int(5) Primary Key Auto_Increment,
    Cname varchar(100) Not null,
    Caddress varchar(100),
    Cphone varchar(100) Not null,
    Cproduct varchar(500),
    Cquantity int(50)
    )";
if(mysqli_query($conn,$sql))
{
    echo("Table Created Successfully.<br>");
}
else{
    echo("Error!".$sql."<br>".mysqli_error($conn));
}
$sql="Insert into customer(Cname,Caddress,Cphone,Cproduct,Cquantity)
    values('Ramu','Thane',9876091054,'hand-wash',2)";
if(mysqli_query($conn,$sql))
{
    echo("Record Inserted Successfully");
}
else{
        echo("Error!".$sql."<br>".mysqli_error($conn));
}
mysqli_close($conn);
?>