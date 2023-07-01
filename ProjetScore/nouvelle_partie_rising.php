<?php session_start(); 

include 'db_connection.php';
//Requête SQL pour récupérer l'odre des scores
$stmt1 = $conn->prepare("SELECT ordre FROM jeux WHERE nom = ? ");
$stmt1->bind_param("s", $_SESSION['jeu']);
$stmt1->execute();
$result1 = $stmt1->get_result();
$row1 = $result1->fetch_assoc();

//Requête SQL pour récupérer le classement du joueur avec le meilleur score
$stmt2 = $conn->prepare("SELECT joueur, score FROM scores WHERE jeu = ? ORDER BY score " . $row1['ordre']);
$stmt2->bind_param("s", $_SESSION['jeu']);
$stmt2->execute();
$result2 = $stmt2->get_result();
$row2 = $result2->fetch_assoc();

// Fermeture des requêtes préparées
$stmt1->close();
$stmt2->close();

// Supprimer les caractères spéciaux et les espaces
$string = $_SESSION['jeu'];
$wallpaper = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Board Game Score Pad</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body class="wallpaper-<?php echo $wallpaper ?>">

<!-- Barre de navigation -->
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="index.php">Board Game Score Pad</a>
</nav>

<!-- Contenu de la page -->
<div class="container mt-4 text-center">
	<h1 class="text-contour"><?php echo $_SESSION['jeu']; ?></h1>
	<?php if($row2){
	echo "<span class='badge badge-light float-right'><h5'>Record : <b>" . $row2['score'] . "</b> pts (<b>" . $row2['joueur'] . "</b>)</h5></span>";
	}?>
	<!-- Formulaire pour saisir le nombre de joueurs -->
	<?php
	if(isset($_SESSION['nb_joueurs'])) {
		$nb_joueurs = $_SESSION['nb_joueurs'];
		echo "<form method='post' onsubmit='return confirmerEnregistrement()'>";
		echo "<table class='table mt-2' id='tableau_scores'>";
		echo "<thead class='thead-dark'>";
		echo "<tr>";
		echo "<th class='col-2'><img src='img/En-tete/player.png' alt='joueur'></th>";
		echo "<th class='col-1'><img src='img/Rising/fin.png' alt='fin de partie'></th>";
		echo "<th class='col-1'><img src='img/Rising/carte.png' alt='cartes(pv+compétences)'></th>";
		echo "<th class='col-1'><img src='img/Rising/calculatrice.png' alt='point'></th>";
		echo "<th class='col-1'></th>";
		echo "<th class='col-1'><img src='img/Rising/flotte.png' alt='flottes'></th>";
        echo "<th class='col-1'><img src='img/Rising/helium.png' alt='helium'></th>";
        echo "<th class='col-1'><img src='img/Rising/souverain.png' alt='jeton souverain'></th>";
		echo "<th class='col-1'><img src='img/Rising/influence.png' alt='influences'></th>";
		echo "<th class='col-1'><img src='img/Rising/malus.png' alt='carte malus'></th>";
        echo "<th class='col-2'><img src='img/En-tete/score.png' alt='score'></th>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		for ($i=1; $i<=$nb_joueurs; $i++) {
			echo "<tr>";
			echo "<td><input type='text' name='joueur-$i' class='form-control text-center bold' value='Joueur $i' required></td>";
            echo "<td><div class='centered-number'><input type='number' name='fin-$i' class='form-control text-center' id='fin-$i' oninput='calculateTotalScore()' value='0' onkeydown='handleEnterKeyPress(event, $i)'></div></td>";
            echo "<td><div class='centered-number'><input type='number' name='carte-$i' class='form-control text-center' id='carte-$i' oninput='calculateTotalScore()' value='0' onkeydown='handleEnterKeyPress(event, $i)' readonly></div></td>";
            echo "<td><div class='centered-number'><input type='number' name='points-$i' class='form-control text-center' id='points-$i' value='0' onkeydown='handleEnterKeyPress(event, $i)'></div></td>";
      		echo "<td><button type='button' id='ajouter-$i' class='btn btn-dark' onclick='addPoints($i)'>+</button></td>";
			echo "<td><div class='centered-number'><input type='number' name='flotte-$i' class='form-control text-center' id='flotte-$i' oninput='calculateTotalScore()' value='0' onkeydown='handleEnterKeyPress(event, $i)'></div></td>";
			echo "<td><div class='centered-number'><input type='number' name='helium-$i' class='form-control text-center' id='helium-$i' oninput='calculateTotalScore()' value='0' onkeydown='handleEnterKeyPress(event, $i)'></div></td>";
			echo "<td><div class='centered-number'><input type='number' name='souverain-$i' class='form-control text-center' id='souverain-$i' oninput='calculateTotalScore()' value='0' onkeydown='handleEnterKeyPress(event, $i)'></div></td>";
			echo "<td><div class='centered-number'><input type='number' name='influence-$i' class='form-control text-center' id='influence-$i' oninput='calculateTotalScore()' value='0' onkeydown='handleEnterKeyPress(event, $i)'></div></td>";
			echo "<td><div class='centered-number'><input type='number' name='malus-$i' class='form-control text-center' id='malus-$i' oninput='calculateTotalScore()' value='0' onkeydown='handleEnterKeyPress(event, $i)'></div></td>";
			echo "<td><div class='centered-number'><input type='number' name='score-$i' class='form-control text-center bold' id='score-$i' value='0' readonly></div></td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
		echo "<div class='btn-group'>";
		echo "<button type='submit' name='submit' class='btn btn-dark btn-sm'><img src='img/Bouton/save.png' alt='enregister'></button>";
		echo "<a href='index.php' name='return' class='btn btn-dark btn-sm ml-2'><img src='img/Bouton/home.png' alt='accueil'></a>";
		echo "</div>";
  		echo "</form>";
	}
	if(isset($_POST['submit'])){
		for ($i=1; $i<=$nb_joueurs; $i++) {
			$joueur = $_POST["joueur-$i"];
			$score = $_POST["score-$i"];
			if($row1['ordre'] == "ASC"){
				$ordre = '>';
			}
			else {
				$ordre = '<';
			}	
			// Vérification si le joueur existe déjà dans la base de données
			$stmt = $conn->prepare("SELECT score FROM scores WHERE joueur = ? AND jeu = ? AND score $ordre ?");
			$stmt->bind_param("ssi", $joueur, $_SESSION['jeu'] , $score);
			$stmt->execute();
			$result = $stmt->get_result();

			$stmt3 = $conn->prepare("SELECT score FROM scores WHERE joueur = ? AND jeu = ?");
			$stmt3->bind_param("ss", $joueur, $_SESSION['jeu']);
			$stmt3->execute();
			$result3 = $stmt3->get_result();
		
			// Si le joueur existe et qu'il a un meilleur score, mise à jour de ses données
			if($result->num_rows > 0) {
			  $stmt = $conn->prepare("UPDATE scores SET score = ? WHERE joueur = ? AND jeu = ?");
			  $stmt->bind_param("iss", $score, $joueur, $_SESSION['jeu']);
			  $stmt->execute();
			}
			// Sinon, si le joueur existe pas insertion des données du joueur dans la base de données
			else if ($result3->num_rows == 0) {
			  $stmt = $conn->prepare("INSERT INTO scores (joueur, score, jeu) VALUES (?, ?, ?)");
			  $stmt->bind_param("sis", $joueur, $score, $_SESSION['jeu']);
			  $stmt->execute();
			}
		}
	}	
	?>	

<script>
	function addPoints(joueur) {
        var points = document.getElementById("points-" + joueur).value;
        var carte = document.getElementById("carte-" + joueur).value;
        carte = parseInt(carte) + parseInt(points);
        document.getElementById("carte-" + joueur).value = carte;
		document.getElementById("points-" + joueur).value = 0;
		calculateTotalScore();
	}
	
	function handleEnterKeyPress(event, joueur) {
        if (event.keyCode === 13) {
            event.preventDefault();
            addPoints(joueur);
        }
    }

    function calculateTotalScore() {
        <?php
        for ($i=1; $i<=$nb_joueurs; $i++) {
            echo "var fin = parseInt(document.getElementById('fin-$i').value) || 0;";
            echo "var carte = parseInt(document.getElementById('carte-$i').value) || 0;";
            echo "var flotte = parseInt(document.getElementById('flotte-$i').value) || 0;";
			echo "var helium = parseInt(document.getElementById('helium-$i').value) || 0;";
			echo "var souverain = parseInt(document.getElementById('souverain-$i').value) || 0;";
			echo "var influence = parseInt(document.getElementById('influence-$i').value) || 0;";
			echo "var malus = parseInt(document.getElementById('malus-$i').value) || 0;";
            echo "var totalScore = fin + carte + flotte + helium + souverain + influence + malus;";
            echo "document.getElementById('score-$i').value = totalScore;";
        }
        ?>
    }
    
    function confirmerEnregistrement() {
  		if (confirm("Êtes-vous sûr de vouloir enregistrer les scores ?")) {
   			return true;
  		} else {
    		return false;
  		}
	}	
</script>
</body>
</html>
