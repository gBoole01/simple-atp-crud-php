<?php
require('lib/dbConnect.php');

$pdo = dbConnect();
// TODO: Handle View Player

// $sql = "SELECT * FROM players WHERE rank BETWEEN 1 AND 3 ORDER BY rank";
// $stmt = $pdo->prepare($sql);
// $stmt->execute();
// $result = $stmt->fetchAll();

include('inc/header.php'); ?>
<h1 class="fw-bolder mb-3">Player informations</h1>
<!-- TODO: Create view Player Card -->
<?php include('inc/footer.php');
