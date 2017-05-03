<?php
session_start();
header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=VisitorReport.csv");
$output = fopen("php://output", "w");
foreach ($_SESSION["report"] as $row)
fputcsv($output, $row); // here you can change delimiter/enclosure
fclose($output);
?>
