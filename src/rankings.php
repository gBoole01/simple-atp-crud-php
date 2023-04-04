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
    <div class="table-responsive">
        <table class="table table-striped align-middle text-center">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Name</th>
                    <th>Country</th>
                    <th>Age</th>
                    <th>Points</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $player) { ?>
                    <tr>
                        <td class="fs-4 fw-bold"><?= $player["rank"] ?></td>
                        <td><?= $player["firstname"] . " " . $player["lastname"] ?></td>
                        <td><?= $player["country"] ?></td>
                        <td><?= $player["age"] ?></td>
                        <td><?= $player["points"] ?></td>
                        <td>
                            <a class="btn btn-primary" href="/viewPlayer.php?id=<?= $player["uuid"] ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include('inc/footer.php');
