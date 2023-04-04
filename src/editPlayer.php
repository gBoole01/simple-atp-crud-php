<?php
require('lib/dbConnect.php');

$pdo = dbConnect();
// TODO: Handle editPlayer Form

// $sql = "SELECT * FROM players WHERE rank BETWEEN 1 AND 3 ORDER BY rank";
// $stmt = $pdo->prepare($sql);
// $stmt->execute();
// $result = $stmt->fetchAll();

include('inc/header.php'); ?>
<h1 class="fw-bolder mb-3">Edit player</h1>
<!-- TODO: Create editPlayer Form -->
<?php include('inc/footer.php');
