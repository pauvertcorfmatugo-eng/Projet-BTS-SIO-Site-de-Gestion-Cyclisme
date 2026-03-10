<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>course-ajouter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
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
        <h1 class="text-center mb-4">Ajouter une course</h1>
        <div class="alert alert-info text-center mb-4">
            Bienvenue sur Decap Velo ! Ce site permet de gérer les clubs, les cyclistes et les courses, d'ajouter de nouveaux événements et de visualiser toutes les informations du club. Utilisez le menu pour naviguer entre les différentes fonctionnalités.
        </div>
        <div class="d-flex justify-content-center">
            <form action="course-ajouter.php" method="post" class="w-100" style="max-width:400px;">
                <label for="libelleCourse" class="form-label">Nom de la course</label>
                <input type="text" id="libelleCourse" name="libelleCourse" class="form-control mb-3" required placeholder="Nom de la course">
                <label for="dateCourse" class="form-label">Date de la course</label>
                <input type="date" id="dateCourse" name="dateCourse" class="form-control mb-3" required>
                <label for="villeCourse" class="form-label">Ville de la course</label>
                <input type="text" id="villeCourse" name="villeCourse" class="form-control mb-3" required placeholder="Ville de la course">
                <input type="submit" value="Ajouter la course" class="btn btn-primary w-100">
            </form>
        </div>
        <?php
        include 'accesBD.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idCourse = donneProchainIdentifiant("course","id");
            $libelleCourse = $_POST['libelleCourse'];
            $dateCourse = $_POST['dateCourse'];
            $villeCourse = $_POST['villeCourse'];
            insertCourse($idCourse, $libelleCourse, $dateCourse, $villeCourse);
            echo "<div class='text-success text-center mt-3'>Course ajoutée avec succès!</div>";
        }
        ?>
    </div>
</body>
</html>