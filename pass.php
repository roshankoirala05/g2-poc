<?php
$address= $_GET["name"];
$citystateZip=explode(",",$address);

echo $citystateZip[0];
echo $citystateZip[1];
echo $citystateZip[2];
echo $citystateZip[3];

echo $address;


?>