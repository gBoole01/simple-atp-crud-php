<?php
require('lib/dbConnect.php');

function asciiToEmoji($ascii)
{
    // Split the ASCII string into two characters
    $char1 = $ascii[0];
    $char2 = $ascii[1];

    // Calculate the code point for the first character
    $code1 = ord($char1) - 65 + 127462;

    // Calculate the code point for the second character
    $code2 = ord($char2) - 65 + 127462;

    // Combine the code points into a single emoji
    $emoji = mb_convert_encoding("&#$code1;&#$code2;", "UTF-8", "HTML-ENTITIES");

    return $emoji;
}

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
                            <a class="btn btn-warning" href="/editPlayer.php?id=<?= $player["uuid"] ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                            </a>
                            <a class="btn btn-danger" href="/deletePlayer.php?id=<?= $player["uuid"] ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
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