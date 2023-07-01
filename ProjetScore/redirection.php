<?php
session_start();
$jeu = $_POST['jeu'];
$_SESSION['nb_joueurs'] = $_POST['nb_joueurs'];
$_SESSION['jeu'] = $jeu;

include 'db_connection.php';
// Requête SQL pour récupérer le type de scorepad
$stmt = $conn->prepare("SELECT scorepad FROM jeux WHERE nom = ?");
$stmt->bind_param("s", $jeu);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
if(isset($_POST['nouvelle_partie']) && $jeu != "") {
    if($row['scorepad'] == "defaut"){
        header("Location: nouvelle_partie_defaut.php");
    }
    else if ($row['scorepad'] == "none"){
        header("Location: nouvelle_partie_none.php");
    }
    else if ($row['scorepad'] == "manche3"){
        header("Location: nouvelle_partie_manche3.php");
    }
    else if ($row['scorepad'] == "manche4"){
        header("Location: nouvelle_partie_manche4.php");
    }
    else if ($row['scorepad'] == "abyss"){
        header("Location: nouvelle_partie_abyss.php");
    }
    else if ($row['scorepad'] == "rising"){
        header("Location: nouvelle_partie_rising.php");
    }
    else if ($row['scorepad'] == "nidavellir"){
        header("Location: nouvelle_partie_nidavellir.php");
    }
    else if ($row['scorepad'] == "huns"){
        header("Location: nouvelle_partie_huns.php");
    }
    else {
        header("Location: index.php");
    }	
} elseif(isset($_POST['affichage_score']) && $jeu != "") {
    header("Location: affichage_score.php");
} else {
	header("Location: index.php");
}
?>
