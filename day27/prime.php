<?php
$no=7;
$count=0;
for($i=1;$i<=10;$i++)
{
    if($no%$i==0)
    {
        $count++;
    }
}
if($count==2)
{
    echo($no."is prime");
}
else{
    
    echo($no."is not prime");
}
?>