<?php
require('lib/dbConnect.php');

$pdo = dbConnect();
$sql = "SELECT * FROM players WHERE rank BETWEEN 1 AND 3 ORDER BY rank";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

include('inc/header.php'); ?>
<h1 class="fw-bolder mb-3">Top 3 Players</h1>
<div class="container-fluid d-flex flex-column gap-3">
    <?php foreach ($result as $player) { ?>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="card-title"><?= $player["firstname"] . " " . $player["lastname"] ?></h2>
                <p class="card-text fs-1 fw-bold"><?= $player["rank"] ?></p>

            </div>
            <div class="card-body d-flex flex-column">
                <p class="card-text">Points: <?= $player["points"] ?></p>
                <p class="card-text">Age: <?= $player["age"] ?></p>
                <p class="card-text">Country: <?= $player["country"] ?></p>
                <a href="/viewPlayer.php?id=<?= $player['uuid'] ?>" class="btn btn-primary align-self-end">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                    </svg>
                </a>
            </div>
        </div>
    <?php } ?>
    <a href="/rankings.php" class="btn btn-primary align-self-end">See all rankings</a>
</div>
<?php include('inc/footer.php');
