<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<form action="clubs-visualiser.php" method="post">
	

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
                    </ul>
                </li>
      		</ul>
    		</div>
  		</div>
	</nav>

	<div class="header-photo">
		<img src="ChatGPT Image 9 janv. 2026, 16_40_29.png" alt="Photo principale ChatGPT">
	</div>

	<div class="carousel-container">
		<div class="carousel-track">
			<img src="Ciclismo in Alta Montagna.jpg" alt="Photo 2">
			<img src="download (1).jpg" alt="Photo 3">
			<img src="download.jpg" alt="Photo 4">
			<img src="SystemSix.jpg" alt="Photo 5">
			<img src="Tour de France sprint.jpg" alt="Photo 6">
			<!-- Images dupliquées pour effet boucle continue -->
			<img src="Ciclismo in Alta Montagna.jpg" alt="Photo 2 bis">
			<img src="download (1).jpg" alt="Photo 3 bis">
			<img src="download.jpg" alt="Photo 4 bis">
			<img src="SystemSix.jpg" alt="Photo 5 bis">
			<img src="Tour de France sprint.jpg" alt="Photo 6 bis">
		</div>
	</div>


	</form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>



