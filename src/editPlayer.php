<?php
require('lib/dbConnect.php');
$pdo = dbConnect();

$playerId = $_GET['id'] ?? null;
if (!$playerId) {
    header('Location: /index.php');
}

$sql = "SELECT * FROM players WHERE uuid = :uuid";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':uuid', $playerId, PDO::PARAM_STR);
$stmt->execute();
$player = $stmt->fetch();

$firstnameError = "";
$lastnameError = "";
$countryError = "";
$ageError = "";
$rankError = "";
$pointsError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'] ?? "";
    $lastname = $_POST['lastname'] ?? "";
    $country = $_POST['country'] ?? "";
    $age = $_POST['age'] ?? "";
    $rank = $_POST['rank'] ?? "";
    $points = $_POST['points'] ?? "";

    if (empty($firstname)) {
        $firstnameError = "First Name is required";
    }
    if (empty($lastname)) {
        $lastnameError = "Last Name is required";
    }
    if (empty($country)) {
        $countryError = "Country is required";
    }
    if (!is_numeric($age)) {
        $ageError = "Age must be a number";
    }
    if (empty($age)) {
        $ageError = "Age is required";
    }
    if (!is_numeric($rank)) {
        $rankError = "Rank must be a number";
    }
    if (empty($rank)) {
        $rankError = "Rank is required";
    }
    if (!is_numeric($points)) {
        $pointsError = "Points must be a number";
    }
    if (empty($points)) {
        $pointsError = "Points is required";
    }
    $formValid = empty($firstnameError)
        && empty($lastnameError)
        && empty($countryError)
        && empty($ageError)
        && empty($rankError)
        && empty($pointsError);

    if ($formValid) {
        $sql = "UPDATE players SET firstname = :firstname, lastname = :lastname, country = :country, age = :age, rank = :rank, points = :points WHERE uuid = :uuid";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':uuid', $playerId, PDO::PARAM_STR);
        $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $stmt->bindParam(':country', $country, PDO::PARAM_STR);
        $stmt->bindParam(':age', $age, PDO::PARAM_INT);
        $stmt->bindParam(':rank', $rank, PDO::PARAM_INT);
        $stmt->bindParam(':points', $points, PDO::PARAM_INT);

        $stmt->execute();
        header("Location: viewPlayer.php?id=" . $playerId);
    }
}

include('inc/header.php'); ?>
<h1 class="fw-bolder mb-3">Edit player</h1>
<form class="d-flex flex-column gap-3" action="/editPlayer.php?id=<?= $playerId ?>" method="POST" novalidate>
    <div>
        <label for="firstname" class="form-label">First Name</label>
        <input type="text" class="form-control" id="firstname" name="firstname" required value="<?= $player['firstname'] ?>">
        <?= !empty($firstnameError) ? "<div class='alert alert-danger my-1'>" . $firstnameError . "</div>" : null ?>
    </div>
    <div>
        <label for="lastname" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="lastname" name="lastname" required value="<?= $player['lastname'] ?>">
        <?= !empty($lastnameError) ? "<div class='alert alert-danger my-1'>" . $lastnameError . "</div>" : null ?>
    </div>
    <div>
        <label for="country" class="form-label">Country</label>
        <input type="text" class="form-control" id="country" name="country" required value="<?= $player['country'] ?>">
        <?= !empty($countryError) ? "<div class='alert alert-danger my-1'>" . $countryError . "</div>" : null ?>
    </div>
    <div>
        <label for="age" class="form-label">Age</label>
        <input type="number" class="form-control" id="age" name="age" required value="<?= $player['age'] ?>">
        <?= !empty($ageError) ? "<div class='alert alert-danger my-1'>" . $ageError . "</div>" : null ?>
    </div>
    <div>
        <label for="rank" class="form-label">Rank</label>
        <input type="number" class="form-control" id="rank" name="rank" required value="<?= $player['rank'] ?>">
        <?= !empty($rankError) ? "<div class='alert alert-danger my-1'>" . $rankError . "</div>" : null ?>
    </div>
    <div>
        <label for="points" class="form-label">Points</label>
        <input type="number" class="form-control" id="points" name="points" required value="<?= $player['points'] ?>">
        <?= !empty($pointsError) ? "<div class='alert alert-danger my-1'>" . $pointsError . "</div>" : null ?>
    </div>
    <div class="text-end">
        <a href="/viewPlayer.php?id=<?= $player["uuid"] ?>" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>

<?php include('inc/footer.php');
