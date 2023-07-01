<?php
include 'db_connection.php';

// Requête SQL pour récupérer la liste des jeux
$sql = "SELECT nom FROM jeux ORDER BY nom ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Board Game Score Pad</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body class="wallpaper-Accueil">

<!-- Barre de navigation -->
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="index.php">Board Game Score Pad</a>
</nav>

<!-- Contenu de la page -->
<div class="container mt-4 text-center">
	<h2>Générer Score Pad :</h2>
	<form method="post" action="redirection.php">
		<div class="form-group mt-4 mx-auto">
		<?php
        // Affichage de la liste déroulante des jeux
        echo '<select name="jeu" class="form-control text-center col-4 custom-select" required">';
        echo '<option value="">-- Choisissez un jeu --</option>';
        while($row = $result->fetch_assoc()) {
          echo '<option value="' . $row["nom"] . '">' . $row["nom"] . '</option>';
        }
        echo '</select>';
        ?>
		</div>
		<div class="mt-4">
				<b><label for="nb_joueurs">Nombre de joueurs :</label></b>
				<input type="number" class="form-center text-center col-2" id="nb_joueurs" name="nb_joueurs" min="1" max="12" value="1">
		</div>
		<!-- Boutons de navigation -->
		<div><button class="btn btn-dark mt-2 col-4" type="submit" name="nouvelle_partie" value="Nouvelle partie">Nouvelle partie</button></div>
		<div><button class="btn btn-dark mt-2 col-4" type="submit" name="affichage_score" value="Affichage score">Affichage score</button></div>
	</form>
</div>

<!-- Scripts JavaScript Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
