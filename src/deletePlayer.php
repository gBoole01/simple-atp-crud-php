<?php
require('lib/dbConnect.php');
$pdo = dbConnect();

$playerId = $_GET['id'] ?? null;
if (!$playerId) {
    header('Location: /index.php');
    exit;
}
