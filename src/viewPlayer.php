<?php
require('lib/dbConnect.php');
require('lib/countries.php');

$pdo = dbConnect();

$countries = getCountries();

$playerId = $_GET['id'] ?? null;
if (!$playerId) {
    header('Location: /index.php');
}

$sql = "SELECT * FROM players WHERE uuid = :uuid";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':uuid', $playerId, PDO::PARAM_STR);
$stmt->execute();
$player = $stmt->fetch();

$playerImage = $player['image'] ? "/assets/img/players/" . $player['image'] : 'https://placehold.co/100x141?text=No+image&font=Montserrat';

include('inc/header.php'); ?>
<h1 class="fw-bolder mb-3">Player informations</h1>
<div class="row mb-3 justify-content-between">
    <div class="col-6">
        <a href="/rankings.php" class="btn btn-success">Back to rankings</a>
    </div>
    <div class="col-6 text-end">
        <a class="btn btn-warning" href="/editPlayer.php?id=<?= $player["uuid"] ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Edit">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
            </svg>
        </a>
        <span data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
            <button type="button" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Delete">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                </svg>
            </button>
        </span>
    </div>
</div>

<div class="card player-infos">
    <img class="img-thumbnail" src="<?= $playerImage ?>" alt="<?= 'portait of ' . $player['firstname'] . ' ' . $player['lastname'] ?>">
    <img height=35 width=40 src="assets/img/flags/<?= $player['country'] ?>.svg" alt="Flag of <?= $countries[$player['country']] ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="<?= $countries[$player['country']] ?>">
    <h2><?= $player["firstname"] . " " . $player["lastname"] ?></h2>
    <p class="fs-1 fw-bold"><?= $player["rank"] ?></p>
    <p><span class="fw-bold">Points:</span> <?= $player["points"] ?></p>
    <p><span class="fw-bold">Age:</span> <?= $player["age"] ?></p>
    <p><span class="fw-bold">Country:</span> <?= $countries[$player["country"]] ?></p>
</div>

<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                Are you sure you want to delete this player ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a class="btn btn-success" href="/deletePlayer.php?id=<?= $player["uuid"] ?>">Confirm</a>
            </div>
        </div>
    </div>
</div>
<?php include('inc/footer.php');
