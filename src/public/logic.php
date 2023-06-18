<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\SpendingReport;

$dbUserName = "root";
$dbPassword = "password";
$spendingReport = new SpendingReport($dbUserName, $dbPassword);
$spendingReport->printMonthlySpendings(2);
?>


