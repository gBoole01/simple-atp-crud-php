<?php
require('lib/dbConnect.php');

$pdo = dbConnect();
$sql = "SELECT * FROM players ORDER BY rank";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

include('inc/header.php'); ?>
<h1 class="fw-bolder mb-3">Rankings</h1>
<div class="container-fluid d-flex flex-column gap-3">
    <?php foreach ($result as $player) { ?>
        <!-- TODO: Create Rankings Table -->
        <pre><?= var_dump($player) ?></pre>
    <?php } ?>
</div>
<?php include('inc/footer.php');
