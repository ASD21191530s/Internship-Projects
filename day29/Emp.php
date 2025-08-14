<?php
$user="root";
$pass="";
$server="localhost";
$db="ASD";
$conn= mysqli_connect($server,$user,$pass,$db);
if(!$conn)
{
die("Connection Failed!".mysqli_connect_error());
}
echo("Connected successfully.<br>");
$sql="Create table employee(
    Employeeid int(5) Primary key Auto_Increment,
    Ename varchar(100) Not null,
    Eemail varchar(100),
    Ephone varchar(20) Not null,
    Esalary int(20)
    )";
if(mysqli_query($conn,$sql))
{
    echo("Table Created Successfully.<br>");
}
else{
    echo("error:".$sql."<br>".mysqli_error($conn));
}
$sql="Insert into employee(Ename,Eemail,Ephone,Esalary)
    values('Atharva','atharvadhore71@gmail.com',9011146085,100000)";
    if(mysqli_query($conn,$sql)){
    echo(" record Inserted successfully");
}
else{
    echo("error:".$sql."<br>".mysqli_error($conn));
}
mysqli_close($conn);
?>