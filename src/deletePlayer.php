<?php
require('lib/dbConnect.php');
$pdo = dbConnect();

$playerId = $_GET['id'] ?? null;
if (!$playerId) {
    header('Location: /index.php');
    exit;
}

$sql = "DELETE FROM players WHERE uuid = :uuid";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':uuid', $playerId, PDO::PARAM_STR);
try {
    $stmt->execute();
    $stmt->fetch();
    header("Location: rankings.php");
} catch (Exception $e) {
    header("Location: rankings.php");
}
