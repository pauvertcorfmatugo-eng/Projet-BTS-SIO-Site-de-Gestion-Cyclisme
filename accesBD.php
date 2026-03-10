<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
<?php

	function chargement($uneTable)
	{
		$lesInfos = null;
		$nbTuples = 0;
		$conn = new PDO("mysql:dbname=ap2_velo_ugo;host=127.0.0.1", 'root', 'usersio');
		// Utilise la table passée en paramètre
		$resultatRequete = $conn->prepare('SELECT * FROM ' . $uneTable);
		if ($resultatRequete->execute()) {
			while ($ligneCourante = $resultatRequete->fetch(PDO::FETCH_NUM)) {
				$lesInfos[$nbTuples] = $ligneCourante;
				$nbTuples++;
			}
		} else {
			die('Problème dans chargement : ' . $resultatRequete->errorCode());
		}
		return $lesInfos;
	}
	
	function nombreTuples($uneTable)
	{
		$nbTuples = 0;
		$conn = new PDO("mysql:dbname=ap2_velo_ugo;host=127.0.0.1", 'root', 'usersio');
		// Utilise la table passée en paramètre
		$resultatRequete = $conn->prepare('SELECT * FROM ' . $uneTable);
		if ($resultatRequete->execute()) {
			while ($ligneCourante = $resultatRequete->fetch(PDO::FETCH_NUM)) {
				$nbTuples++;
			}
		} else {
			die('Problème dans chargement : ' . $resultatRequete->errorCode());
		}
		return $nbTuples;
	}

	// insertion d'un club
		function insertClubs($idClubs,$libelleClubs,$villeClubs)
		{
			$actif=1;
			//génération automatique de l'identifiant
			$conn = new PDO("mysql:dbname=ap2_velo_ugo;host=127.0.0.1",'root','usersio');
			$sonId = donneProchainIdentifiant("club","id");
			$chaine= 'INSERT INTO club values ('.$idClubs.',\''.$libelleClubs.'\',\''.$villeClubs.'\')';
			echo $chaine;
			$requete=$conn->prepare($chaine);
			if(!$requete->execute())
			{
				die("Erreur dans insertClient : ".$requete->errorCode());
			}

			//retour de l'identifiant du nouveau tuple
			return $sonId;
			}

		function insertCourse($idClubs,$dateCourse,$libelleCourse,$villeCourse)
		{
			$actif=1;
			//génération automatique de l'identifiant
			$conn = new PDO("mysql:dbname=ap2_velo_ugo;host=127.0.0.1",'root','usersio');
			$sonId = donneProchainIdentifiant("course","id");
			$chaine= 'INSERT INTO course values ('.$sonId.',\''.$libelleCourse.'\',\''.$dateCourse.'\',\''.$villeCourse.'\')';
			echo $chaine;
			$requete=$conn->prepare($chaine);
			if(!$requete->execute())
			{
				die("Erreur dans insertClient : ".$requete->errorCode());
			}

			//retour de l'identifiant du nouveau tuple
			return $sonId;
		}

		function insertCycliste($idCycliste, $nomCycliste, $prenomCycliste, $adresseCycliste, $codePostalCycliste, $villeCycliste, $ageCycliste, $idClub)
		{
			$conn = new PDO("mysql:dbname=ap2_velo_ugo;host=127.0.0.1",'root','usersio');
			$sonId = donneProchainIdentifiant("cycliste","id");
			$chaine= 'INSERT INTO cycliste values ('
				.$sonId.',\''.$nomCycliste.'\',\''.$prenomCycliste.'\',\''.$adresseCycliste.'\',\''.$codePostalCycliste.'\',\''.$villeCycliste.'\',\''.$ageCycliste.'\')';
			$requete=$conn->prepare($chaine);
			if(!$requete->execute())
			{
				die("Erreur dans insertCycliste : ".$requete->errorCode());
			}
			// Ajout dans la table cotisation (club par défaut pour l'année en cours)
			$annee = date('Y');
			$chaineCotisation = 'INSERT INTO cotisation values ('
				.$sonId.', '.$idClub.', '.$annee.')';
			$requeteCotisation = $conn->prepare($chaineCotisation);
			if(!$requeteCotisation->execute())
			{
				die("Erreur dans insertCotisation : ".$requeteCotisation->errorCode());
			}
			return $sonId;
		}
		
	// vérification de la manière dont les noms de tables sont écrit
	function specialCase($stringQuery,$uneTable)
	{
	    $uneTable = strtoupper($uneTable);
	    switch ($uneTable) {
	        case 'CLUB':
	            $stringQuery .= 'CLUB';
	            break;
	        case 'COURSE':
	            $stringQuery .= 'COURSE';
	            break;
	        case 'CYCLISTE':
	            $stringQuery .= 'CYCLISTE';
	            break;
	        default:
	            die('Pas une table valide');
	    }
	    return $stringQuery . ";";
	}
	
	
	function donneProchainIdentifiant($uneTable,$unIdentifiant)
	{
	    $conn = new PDO("mysql:dbname=ap2_velo_ugo;host=127.0.0.1",'root','usersio');
	    $stringQuery = specialCase("SELECT MAX(id) FROM ", $uneTable);
	    $requete = $conn->prepare($stringQuery);
	    if($requete->execute())
	    {
	        $row = $requete->fetch(PDO::FETCH_NUM);
	        $nb = $row[0] ? $row[0] : 0;
	        return $nb+1;
	    }
	    else
	    {
	        die('Erreur sur donneProchainIdentifiant : '.$requete->errorCode());
	    }
	}
	
	
	
	function visualiserCourse($uneTable)
	{
			$tableauDesClients=chargement($uneTable);
			$nbr = nombreTuples($uneTable);
			echo '<table class="table table-hover" border="1">';
			for ($i=0;$i<$nbr;$i++)
			{	echo '<tr>';
				echo '<td>'.$tableauDesClients[$i][0].'</td><td>'.$tableauDesClients[$i][1].'</td><td>'.$tableauDesClients[$i][2].'</td><td>'.$tableauDesClients[$i][3].'</td>';
				echo '</tr>';
			}
			echo '</table>';
	}

	function visualiserClub($uneTable)
	{
			$tableauDesClients=chargement($uneTable);
			$nbr = nombreTuples($uneTable);
			echo '<table class="table table-hover" border="1">';
			for ($i=0;$i<$nbr;$i++)
			{	echo '<tr>';
				echo '<td>'.$tableauDesClients[$i][0].'</td><td>'.$tableauDesClients[$i][1].'</td><td>'.$tableauDesClients[$i][2].'</td>';
				echo '</tr>';
			}
			echo '</table>';
	}
	
	function VisualiserTout()
	{
	    $conn = new PDO("mysql:dbname=ap2_velo_ugo;host=127.0.0.1", 'root', 'usersio');
	    // Requête adaptée pour afficher nom, prénom, club, et toutes les courses
	    $resultatRequete = $conn->prepare('
	        SELECT c.nom, c.prenom, cl.libelle, GROUP_CONCAT(co.libelle SEPARATOR ", ") as courses
	        FROM cycliste c
	        LEFT JOIN cotisation cot ON c.id = cot.idCycliste
	        LEFT JOIN club cl ON cot.idClub = cl.id
	        LEFT JOIN participer p ON c.id = p.idCycliste
	        LEFT JOIN course co ON p.idCourse = co.id
	        GROUP BY c.id, cl.libelle
	    ');
	    if ($resultatRequete->execute()) {
	        $lesInfos = $resultatRequete->fetchAll(PDO::FETCH_NUM);
	    } else {
	        die('Problème dans chargement : ' . $resultatRequete->errorCode());
	    }
	    // Affichage du tableau HTML
	    echo '<table class="table table-hover" border="1">';
		
	    echo '<tr><th>Nom</th><th>Prénom</th><th>Club</th><th>Courses</th></tr>';
	    foreach ($lesInfos as $ligne) {
	        echo '<tr>';
	        foreach ($ligne as $cell) {
	            echo '<td>' . $cell . '</td>';
	        }
	        echo '</tr>';
	    }
	    echo '</table>';
	}

	function rechercherCycliste($terme) {
	    $conn = new PDO("mysql:dbname=ap2_velo_ugo;host=127.0.0.1", 'root', 'usersio');
	    $sql = 'SELECT c.nom, c.prenom, cl.libelle, GROUP_CONCAT(co.libelle SEPARATOR ", ") as courses
	            FROM cycliste c
	            LEFT JOIN cotisation cot ON c.id = cot.idCycliste
	            LEFT JOIN club cl ON cot.idClub = cl.id
	            LEFT JOIN participer p ON c.id = p.idCycliste
	            LEFT JOIN course co ON p.idCourse = co.id
	            WHERE c.nom LIKE :terme OR c.prenom LIKE :terme
	            GROUP BY c.id, cl.libelle';
	    $requete = $conn->prepare($sql);
	    $requete->execute([':terme' => "%$terme%"]);
	    $lesInfos = $requete->fetchAll(PDO::FETCH_NUM);
	    // Affichage du tableau HTML
	    echo '<table class="table table-hover" border="1">';
	    echo '<tr><th>Nom</th><th>Prénom</th><th>Club</th><th>Courses</th></tr>';
	    foreach ($lesInfos as $ligne) {
	        echo '<tr>';
	        foreach ($ligne as $cell) {
	            echo '<td>' . $cell . '</td>';
	        }
	        echo '</tr>';
	    }
		
	    echo '</table>';
	}

?>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>


