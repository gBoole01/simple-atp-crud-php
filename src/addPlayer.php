<?php
require('lib/dbConnect.php');
$pdo = dbConnect();

$playerId = $_GET['id'] ?? null;
if (!$playerId) {
    header('Location: /index.php');
    exit;
}
// TODO: Handle addPlayer Form

// $sql = "SELECT * FROM players WHERE rank BETWEEN 1 AND 3 ORDER BY rank";
// $stmt = $pdo->prepare($sql);
// $stmt->execute();
// $result = $stmt->fetchAll();

include('inc/header.php'); ?>
<h1 class="fw-bolder mb-3">Add a new player</h1>
<!-- TODO: Create addPlayer Form -->
<?php include('inc/footer.php');
