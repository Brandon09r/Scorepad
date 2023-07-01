<?php session_start();
$jeu = $_SESSION['jeu'];

include 'db_connection.php';
//Requête SQL pour récupérer l'odre des scores'
$stmt1 = $conn->prepare("SELECT ordre FROM jeux WHERE nom = ? ");
$stmt1->bind_param("s", $_SESSION['jeu']);
$stmt1->execute();
$result1 = $stmt1->get_result();
$row1 = $result1->fetch_assoc();

//Requête SQL pour récupérer le classement des joueurs avec leur score
$stmt = $conn->prepare("SELECT joueur, score FROM scores WHERE jeu = ? ORDER BY score " . $row1['ordre'] . " LIMIT 99");
$stmt->bind_param("s", $jeu);
$stmt->execute();
$result = $stmt->get_result();

// Fermeture des requêtes préparées
$stmt1->close();
$stmt->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Board Game Score Pad</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<!-- Barre de navigation -->
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="index.php">Board Game Score Pad</a>
</nav>

<!-- Contenu de la page -->
<div class="container mt-4 text-center">
	<h1><?php echo $_SESSION['jeu']; ?></h1>
	<?php
    // création du tableau HTML
    echo "<table class='table mt-4 col-6 mx-auto'>";
    echo "<thead class='thead-dark'>";
    echo "<tr>";
		echo "<th class='col-4'></th>";
		echo "<th class='col-4'><img src='img/En-tete/player.png' alt='joueur'></th>";
		echo "<th class='col-4'><img src='img/En-tete/score.png' alt='score'></th>";
		echo "</tr>";
    echo "<tbody>";
    $position = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>'. $position .'.</td>';
        echo '<td>' . $row['joueur'] . '</td>';
        echo '<td>' . $row['score'] . '</td>';
        echo '</tr>';
        $position++;
    }

    echo '</tbody>';
    echo '</table>';
// fermeture de la connexion
mysqli_close($conn);
?>	
</div>