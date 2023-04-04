<?php
require('lib/dbConnect.php');

$pdo = dbConnect();
$sql = "SELECT * FROM players WHERE rank BETWEEN 1 AND 3 ORDER BY rank";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

include('inc/header.php'); ?>
<h1>Top 3 Players</h1>
<?php foreach ($result as $player) { ?>
    <div class="card">
        <div class="card-header">
            <h2><?= $player["firstname"] . " " . $player["lastname"] ?></h2>
        </div>
        <div class="card-body">
            <div class="card-text"><?= $player["age"] ?></div>
            <div class="card-text"></div>
            <div class="card-text"></div>
            <div class="card-text"></div>
        </div>
    </div>
<?php } ?>
<?php include('inc/footer.php');
