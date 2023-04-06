<?php
require('lib/dbConnect.php');
require('lib/rankingMedal.php');

$pdo = dbConnect();
$sql = "SELECT * FROM players WHERE rank BETWEEN 1 AND 3 ORDER BY rank";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

include('inc/header.php'); ?>
<div class="row gap-3">
    <h2 class="fw-bolder">What is ATP ?</h2>
    <p>ATP stands for the Association of Tennis Professionals. It is the governing body of men's professional tennis and is responsible for organizing and overseeing many of the major tournaments and rankings.</p>

    <p>The ATP was founded in 1972 and is headquartered in London, UK. It represents the interests of male tennis players on the professional tour, and its main objectives are to promote and develop the sport of tennis and to protect the interests of its members.</p>

    <p>The ATP oversees a range of tournaments, including Grand Slam events such as the Australian Open, French Open, Wimbledon, and US Open, as well as ATP Tour events and the ATP Finals. It also maintains a world ranking system that is used to determine seedings for tournaments and to track the progress of individual players over time.</p>
</div>
<div class="row">
    <h2 class="fw-bolder my-3">Top 3 Players</h1>
</div>
<div class="row">
    <div class="container-fluid d-flex flex-wrap justify-content-center gap-4 mt-2">
        <?php foreach ($result as $player) { ?>
            <a href="/viewPlayer.php?id=<?= $player['uuid'] ?>" class="text-decoration-none">
                <div class="card player-card">
                    <div class="row justify-content-between align-items-center m-2">
                        <div class="col-4">
                            <img height=35 width=40 src="assets/img/flags/<?= $player['countryCode'] ?>.svg" alt="Flag of <?= $player['country'] ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="<?= $player['country'] ?>">
                        </div>
                        <div class="col-4">
                            <div class="fs-1"><?= getRankingMedal($player["rank"]) ?></div>
                        </div>
                    </div>
                    <img class="mx-auto my-2 img-thumbnail" height="141" width="100" src="assets/img/players/<?= $player['image'] ?>" alt="<?= 'portait of ' . $player['firstname'] . ' ' . $player['lastname'] ?>">
                    <h3 class="card-title text-center fw-bolder text-white"><?= $player["firstname"] . "<br>" . $player["lastname"] ?></h2>
                        <div class="row bg-light rounded p-3 m-3">
                            <p class="card-text fw-bold text-center mb-2"><?= $player["points"] ?> points</p>
                            <p class="card-text"><span class="fw-bold">Age:</span> <?= $player["age"] ?></p>
                            <p class="card-text"><span class="fw-bold">Country:</span> <?= $player['country'] ?></p>
                        </div>
                </div>
            </a>
        <?php } ?>
    </div>
</div>
<div class="row justify-content-center mt-5">
    <a href="/rankings.php" class="btn btn-success col-8 col-md-4">All rankings</a>
</div>
<?php include('inc/footer.php');
