<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <h2 class="mb-4 text-center">Recherche d'un cycliste</h2>
        <form method="get" class="mb-4 text-center">
            <input type="text" name="terme" placeholder="Nom ou prénom du cycliste" required>
            <input type="submit" value="Rechercher">
        </form>
        <div>
        <?php
        include 'accesBD.php';
        if (isset($_GET['terme']) && strlen(trim($_GET['terme'])) > 0) {
            rechercherCycliste($_GET['terme']);
        }
        ?>
        </div>
    </div>
</body>
</html>
