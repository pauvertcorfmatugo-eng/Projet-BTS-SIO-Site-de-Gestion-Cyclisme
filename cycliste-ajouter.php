<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Cycliste</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'accesBD.php'; ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Decap Velo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item-dropdown">
                        <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Club</button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="clubs-visualiser.php">Visualiser</a></li>
                            <li><a class="dropdown-item" href="clubs-ajouter.php">Ajouter</a></li>
                        </ul>
                    </li>
                    <li class="nav-item-dropdown">
                        <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Course</button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="course-visualiser.php">Visualiser</a></li>
                            <li><a class="dropdown-item" href="course-ajouter.php">Ajouter</a></li>
                        </ul>
                    </li>
                    <li class="nav-item-dropdown">
                        <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Cyclistes</button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="cycliste-clubs-course.php">Voir tout</a></li>
                            <li><a class="dropdown-item" href="recherchecycliste.php">Recherche cycliste</a></li>
                            <li><a class="dropdown-item" href="cycliste-ajouter.php">Ajouter cycliste</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container mt-5">
        <h1 class="text-center mb-4">Ajouter un cycliste</h1>
        
        <div class="alert alert-info text-center mb-4">
            Remplissez ce formulaire pour inscrire un nouveau cycliste et l'associer à son club.
        </div>

        <div class="d-flex justify-content-center">
            <form action="cycliste-ajouter.php" method="post" class="w-100" style="max-width:500px;">
                
                <div class="mb-3">
                    <label for="nomCycliste" class="form-label">Nom</label>
                    <input type="text" id="nomCycliste" name="nomCycliste" class="form-control" required placeholder="Nom">
                </div>
                
                <div class="mb-3">
                    <label for="prenomCycliste" class="form-label">Prénom</label>
                    <input type="text" id="prenomCycliste" name="prenomCycliste" class="form-control" required placeholder="Prénom">
                </div>
                
                <div class="mb-3">
                    <label for="ageCycliste" class="form-label">Âge</label>
                    <input type="number" id="ageCycliste" name="ageCycliste" class="form-control" required placeholder="Âge" min="0">
                </div>

                <div class="mb-3">
                    <label for="adresseCycliste" class="form-label">Adresse</label>
                    <input type="text" id="adresseCycliste" name="adresseCycliste" class="form-control" required placeholder="Rue / Avenue...">
                </div>

                <div class="mb-3">
                    <label for="codePostalCycliste" class="form-label">Code Postal</label>
                    <input type="text" id="codePostalCycliste" name="codePostalCycliste" class="form-control" required placeholder="Ex: 44000">
                </div>

                <div class="mb-3">
                    <label for="villeCycliste" class="form-label">Ville</label>
                    <input type="text" id="villeCycliste" name="villeCycliste" class="form-control" required placeholder="Ville">
                </div>

                <div class="mb-3">
                    <label for="idClub" class="form-label">Club</label>
                    <select name="idClub" id="idClub" class="form-select mb-3" required>
                        <option value="" disabled selected>Choisir un club...</option>
                        <?php
                            // 1. On essaie de charger la table 'CLUB' (en majuscules, comme dans ton fichier SQL)
                            $lesClubs = chargement('CLUB'); 

                            // 2. VÉRIFICATION : On ne lance le foreach que si $lesClubs est bien un tableau
                            if (is_array($lesClubs)) {
                                foreach($lesClubs as $club) {
                                    // $club[0] est l'ID, $club[1] est le Libellé
                                    echo "<option value='".$club[0]."'>".$club[1]."</option>";
                                }
                            } else {
                                // 3. Message de secours si la liste est vide ou nulle
                                echo "<option value='' disabled>Aucun club trouvé (Vérifiez la base de données)</option>";
                            }
                        ?>
                    </select>
                </div>

                <input type="submit" value="Ajouter le cycliste" class="btn btn-primary w-100">
            </form>
        </div>

        <?php
        // Traitement du formulaire
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // 1. Récupération des données du formulaire
            $nom = $_POST['nomCycliste'];
            $prenom = $_POST['prenomCycliste'];
            $adresse = $_POST['adresseCycliste'];
            $cp = $_POST['codePostalCycliste'];
            $ville = $_POST['villeCycliste'];
            $age = $_POST['ageCycliste'];
            $idClub = $_POST['idClub'];

            // 2. Génération de l'ID via accesBD
            $idCycliste = donneProchainIdentifiant("cycliste","id");

            // 3. Insertion en base
            // La fonction insertCycliste dans accesBD.php insère aussi la cotisation
            insertCycliste($idCycliste, $nom, $prenom, $adresse, $cp, $ville, $age, $idClub);
            
            echo "<div class='alert alert-success text-center mt-4'>Cycliste ajouté avec succès et inscrit au club !</div>";
        }
        ?>
    </div>
    
</body>
</html>