<?php

class SpendingReport {
  private $pdo;

  public function __construct($dbUserName, $dbPassword) {
    $this->pdo = new PDO("mysql:host=mysql; dbname=tq_quest; charset=utf8", $dbUserName, $dbPassword);
  }

  public function printMonthlySpendings($month) {
    $sql = "SELECT * FROM spendings WHERE MONTH(accrual_date) = ?";
    $statement = $this->pdo->prepare($sql);
    $statement->execute([$month]);
    $spendings = $statement->fetchAll(PDO::FETCH_ASSOC);

    echo $month . "月の支出" . "<br>";
    foreach($spendings as $spending) {
      echo $spending["name"] . ": " . $spending["amount"];
      echo "<br />";
    }
  }
}

$dbUserName = "root";
$dbPassword = "password";
$spendingReport = new SpendingReport($dbUserName, $dbPassword);
$spendingReport->printMonthlySpendings(2);





